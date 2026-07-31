<?php

namespace App\Repositories\Contracts;

use App\Models\Person;
use App\Models\Visit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Data\VisitSummaryData;
use App\Filters\VisitReportFilters;
use App\Data\VisitReportSummaryData;
use App\Filters\ReturningVisitorsReportFilters;

interface VisitRepositoryInterface
{
    public function paginateForPerson(
        Person $person,
        int $perPage = 15
    ): LengthAwarePaginator;

    public function summaryForPerson(
        Person $person
    ): VisitSummaryData;

    public function report(
        VisitReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator;

    public function reportSummary(
        VisitReportFilters $filters
    ): VisitReportSummaryData;

    public function returningVisitorsReport(
        ReturningVisitorsReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator;

    public function create(
        Person $person,
        array $data
    ): Visit;

    public function delete(Visit $visit): bool;

}
