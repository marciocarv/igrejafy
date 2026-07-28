<?php

namespace App\Repositories;

use App\Models\Person;
use App\Filters\PersonFilters;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Filters\BirthdayReportFilters;
use Illuminate\Support\Facades\DB;


class PersonRepository implements PersonRepositoryInterface
{
    public function all(): Collection
    {
        return Person::all();
    }

    public function paginate(
        PersonFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator {

        return Person::query()

            ->when($filters->name, fn ($query) =>
                $query->where('name', 'like', "%{$filters->name}%")
            )

            ->when($filters->personType, fn ($query) =>
                $query->where('person_type', $filters->personType)
            )

            ->when(!is_null($filters->isActive), fn ($query) =>
                $query->where('is_active', $filters->isActive)
            )

            ->orderBy('name')

            ->paginate($perPage)

            ->withQueryString();
    }

    public function findOrFail(int $id): Person
    {
        return Person::findOrFail($id);
    }

    public function create(array $data): Person
    {
        return Person::create($data);
    }

    public function update(Person $person, array $data): Person
    {
        $person->update($data);

        return $person->refresh();
    }

    public function delete(Person $person): bool
    {
        return (bool) $person->delete();
    }

    public function birthdays(
        BirthdayReportFilters $filters,
        int $perPage = 15
    ): LengthAwarePaginator {

        return Person::query()

            ->when($filters->month, function ($query) use ($filters) {
                $query->whereMonth('birth_date', $filters->month);
            })

            ->when($filters->personType, function ($query) use ($filters) {
                $query->where('person_type', $filters->personType);
            })

            ->when(! is_null($filters->isActive), function ($query) use ($filters) {
                $query->where('is_active', $filters->isActive);
            })

            ->orderByRaw('MONTH(birth_date), DAY(birth_date)')

            ->paginate($perPage)

            ->withQueryString();
    }
}
