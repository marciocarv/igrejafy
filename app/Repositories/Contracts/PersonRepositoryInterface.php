<?php

namespace App\Repositories\Contracts;

use App\Models\Person;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Filters\PersonFilters;
use App\Filters\BirthdayReportFilters;

interface PersonRepositoryInterface
{
    public function all(): Collection;

    public function paginate(
        PersonFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator;

    public function findOrFail(int $id): Person;

    public function create(array $data): Person;

    public function update(Person $person, array $data): Person;

    public function delete(Person $person): bool;

    public function birthdays(
        BirthdayReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator;
}
