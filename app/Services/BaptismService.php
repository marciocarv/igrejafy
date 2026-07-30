<?php

namespace App\Services;

use App\Data\BaptismData;
use App\Models\Person;
use App\Models\Baptism;
use App\Repositories\Contracts\BaptismRepositoryInterface;

class BaptismService
{
    public function __construct(
        private readonly BaptismRepositoryInterface $repository
    ) {
    }

    public function get(Person $person): ?Baptism
    {
        return $this->repository->findByPerson($person);
    }

    public function save(Person $person, BaptismData $data): Baptism
    {
        $baptism = $this->repository->findByPerson($person);

        if ($baptism) {

            return $this->repository->update(
                $baptism,
                $data->toArray()
            );
        }

        return $this->repository->create(
            $person,
            $data->toArray()
        );
    }
}
