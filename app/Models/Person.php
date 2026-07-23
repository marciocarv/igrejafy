<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\PersonType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'person_type',
        'name',
        'gender',
        'birth_date',
        'email',
        'phone',
        'is_active',
    ];

    protected $casts = [
        'person_type' => PersonType::class,
        'gender' => Gender::class,
        'birth_date' => 'date',
        'is_active' => 'boolean',
    ];
}
