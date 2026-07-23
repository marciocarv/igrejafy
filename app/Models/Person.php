<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\PersonType;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'person_type',
        'name',
        'gender',
        'birth_date',
        'email',
        'phone',
        'active',
    ];

    protected $casts = [
        'person_type' => PersonType::class,
        'gender' => Gender::class,
        'birth_date' => 'date',
        'active' => 'boolean',
    ];
}
