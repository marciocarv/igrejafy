<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PersonRepository implements PersonRepositoryInterface
{
    public function all(): Collection
    {
        return Person::all();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Person::paginate($perPage);
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
        return $person->delete();
    }
}
