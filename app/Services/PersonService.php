<?php

namespace App\Services;

use App\Models\Person;
use App\Data\PersonData;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Filters\PersonFilters;

class PersonService
{
    public function __construct(
        protected PersonRepositoryInterface $personRepository
    ) {
    }

    public function listPeople(PersonFilters $filters)
    {
        return $this->personRepository->paginate($filters);
    }

    public function getPerson(int $id): Person
    {
        return $this->personRepository->findOrFail($id);
    }

    public function create(PersonData $data): Person
    {
        return DB::transaction(function () use ($data) {

            return $this->personRepository->create(
                $data->toArray()
            );

        });
    }

    public function update(Person $person, PersonData $data): Person
    {
        return $this->personRepository->update(
            $person,
            $data->toArray()
        );
    }

    public function delete(Person $person): bool
    {
        return $this->personRepository->delete($person);
    }
}
