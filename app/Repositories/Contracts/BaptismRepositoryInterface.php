<?php

namespace App\Repositories\Contracts;

use App\Models\Person;
use App\Models\Baptism;

interface BaptismRepositoryInterface
{
    public function findByPerson(Person $person): ?Baptism;

    public function create(Person $person, array $data): Baptism;

    public function update(Baptism $baptism, array $data): Baptism;
}
