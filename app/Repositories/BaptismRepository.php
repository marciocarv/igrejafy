<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\Baptism;
use App\Repositories\Contracts\BaptismRepositoryInterface;

class BaptismRepository implements BaptismRepositoryInterface
{
    public function findByPerson(Person $person): ?Baptism
    {
        return $person->baptism;
    }

    public function create(Person $person, array $data): Baptism
    {
        return $person->baptism()->create($data);
    }

    public function update(Baptism $baptism, array $data): Baptism
    {
        $baptism->update($data);

        return $baptism->refresh();
    }
}
