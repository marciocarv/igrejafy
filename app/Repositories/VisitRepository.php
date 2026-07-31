<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Visit;
use App\Repositories\Contracts\VisitRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Data\VisitSummaryData;
use App\Filters\VisitReportFilters;
use App\Data\VisitReportSummaryData;
use App\Filters\ReturningVisitorsReportFilters;


class VisitRepository implements VisitRepositoryInterface
{
    public function paginateForPerson(
        Person $person,
        int $perPage = 15
    ): LengthAwarePaginator {
        return $person->visits()
            ->latest('visit_date')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function summaryForPerson(Person $person): VisitSummaryData
    {
        $summary = $person->visits()
            ->selectRaw('
                COUNT(*) as total,
                MIN(visit_date) as first_visit,
                MAX(visit_date) as last_visit
            ')
            ->first();

        return new VisitSummaryData(
            total: (int) $summary->total,
            firstVisit: $summary->first_visit
                ? \Carbon\Carbon::parse($summary->first_visit)
                : null,
            lastVisit: $summary->last_visit
                ? \Carbon\Carbon::parse($summary->last_visit)
                : null,
        );
    }

    public function report(
        VisitReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator {
        return Visit::query()

            ->with('person')

            ->when(
                $filters->startDate,
                fn ($query) =>
                    $query->whereDate(
                        'visit_date',
                        '>=',
                        $filters->startDate
                    )
            )

            ->when(
                $filters->endDate,
                fn ($query) =>
                    $query->whereDate(
                        'visit_date',
                        '<=',
                        $filters->endDate
                    )
            )

            ->when(
                $filters->personType,
                fn ($query) =>
                    $query->whereHas(
                        'person',
                        fn ($personQuery) =>
                            $personQuery->where(
                                'person_type',
                                $filters->personType
                            )
                    )
            )

            ->when(
                ! is_null($filters->isActive),
                fn ($query) =>
                    $query->whereHas(
                        'person',
                        fn ($personQuery) =>
                            $personQuery->where(
                                'is_active',
                                $filters->isActive
                            )
                    )
            )

            ->orderByDesc('visit_date')

            ->paginate($perPage)

            ->withQueryString();
    }

    public function reportSummary(
        VisitReportFilters $filters
    ): VisitReportSummaryData {
        $query = Visit::query()

            ->when(
                $filters->startDate,
                fn ($query) =>
                    $query->whereDate(
                        'visit_date',
                        '>=',
                        $filters->startDate
                    )
            )

            ->when(
                $filters->endDate,
                fn ($query) =>
                    $query->whereDate(
                        'visit_date',
                        '<=',
                        $filters->endDate
                    )
            )

            ->when(
                $filters->personType,
                fn ($query) =>
                    $query->whereHas(
                        'person',
                        fn ($personQuery) =>
                            $personQuery->where(
                                'person_type',
                                $filters->personType
                            )
                    )
            )

            ->when(
                ! is_null($filters->isActive),
                fn ($query) =>
                    $query->whereHas(
                        'person',
                        fn ($personQuery) =>
                            $personQuery->where(
                                'is_active',
                                $filters->isActive
                            )
                    )
            );

        $totalVisits = (clone $query)->count();

        $uniquePeople = (clone $query)
            ->distinct('person_id')
            ->count('person_id');

        $averageVisitsPerPerson = $uniquePeople > 0
            ? round($totalVisits / $uniquePeople, 1)
            : 0.0;

        return new VisitReportSummaryData(
            totalVisits: $totalVisits,
            uniquePeople: $uniquePeople,
            averageVisitsPerPerson: $averageVisitsPerPerson,
        );
    }

    public function returningVisitorsReport(
        ReturningVisitorsReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator {
        return Visit::query()
            ->join('people', 'people.id', '=', 'visits.person_id')

            ->where('people.person_type', 'visitor')

            ->when(
                $filters->startDate,
                fn ($query) =>
                    $query->whereDate(
                        'visits.visit_date',
                        '>=',
                        $filters->startDate
                    )
            )

            ->when(
                $filters->endDate,
                fn ($query) =>
                    $query->whereDate(
                        'visits.visit_date',
                        '<=',
                        $filters->endDate
                    )
            )

            ->when(
                ! is_null($filters->isActive),
                fn ($query) =>
                    $query->where(
                        'people.is_active',
                        $filters->isActive
                    )
            )

            ->whereNull('people.deleted_at')
            ->whereNull('visits.deleted_at')

            ->select([
                'people.id',
                'people.name',
                'people.phone',
            ])

            ->selectRaw('COUNT(visits.id) as visits_count')
            ->selectRaw('MIN(visits.visit_date) as first_visit')
            ->selectRaw('MAX(visits.visit_date) as last_visit')

            ->groupBy(
                'people.id',
                'people.name',
                'people.phone'
            )

            ->havingRaw('COUNT(visits.id) > 1')

            ->orderByDesc('visits_count')
            ->orderBy('people.name')

            ->paginate($perPage)

            ->withQueryString();
    }

    public function create(
        Person $person,
        array $data
    ): Visit {
        return $person->visits()->create($data);
    }

    public function delete(Visit $visit): bool
    {
        return (bool) $visit->delete();
    }


}
