<?php

namespace App\Services;

use App\Data\VisitData;
use App\Models\Person;
use App\Models\Visit;
use App\Repositories\Contracts\VisitRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Data\VisitSummaryData;
use App\Filters\VisitReportFilters;
use App\Data\VisitReportSummaryData;
use App\Filters\ReturningVisitorsReportFilters;

class VisitService
{
    public function __construct(
        private readonly VisitRepositoryInterface $visitRepository
    ) {
    }

    public function listForPerson(Person $person): LengthAwarePaginator
    {
        return $this->visitRepository->paginateForPerson($person);
    }

    public function create(
        Person $person,
        VisitData $data
    ): Visit {
        return $this->visitRepository->create(
            $person,
            $data->toArray()
        );
    }

    public function delete(Visit $visit): bool
    {
        return $this->visitRepository->delete($visit);
    }

    public function summaryForPerson(Person $person): VisitSummaryData
    {
        return $this->visitRepository->summaryForPerson($person);
    }

    public function report(
        VisitReportFilters $filters
    ): LengthAwarePaginator {
        return $this->visitRepository->report($filters);
    }

    public function reportSummary(
        VisitReportFilters $filters
    ): VisitReportSummaryData {
        return $this->visitRepository->reportSummary($filters);
    }

    public function returningVisitorsReport(
        ReturningVisitorsReportFilters $filters
    ): LengthAwarePaginator {
        return $this->visitRepository->returningVisitorsReport($filters);
    }
}
