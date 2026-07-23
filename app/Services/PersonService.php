<?php

namespace App\Services;

use App\Models\Person;
use App\Data\PersonData;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PersonService
{
    public function __construct(
        protected PersonRepositoryInterface $personRepository
    ) {
    }

    public function listPeople(int $perPage = 15)
    {
        return $this->personRepository->paginate($perPage);
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

    public function update(
        Person $person,
        PersonData $data
    ): Person {

        return DB::transaction(function () use ($person, $data) {

            return $this->personRepository->update(
                $person,
                $data->toArray()
            );

        });
    }

    public function delete(Person $person): bool
    {
        return $this->personRepository->delete($person);
    }
}
