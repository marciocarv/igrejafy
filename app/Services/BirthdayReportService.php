<?php

namespace App\Services;

use App\Filters\BirthdayReportFilters;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BirthdayReportService
{
    public function __construct(
        private readonly PersonRepositoryInterface $personRepository
    ) {
    }

    public function list(BirthdayReportFilters $filters): LengthAwarePaginator
    {
        return $this->personRepository->birthdays($filters);
    }
}
