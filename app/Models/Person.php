<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\PersonType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'person_type',
        'name',
        'gender',
        'birth_date',
        'email',
        'phone',

        // New
        'zip_code',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',

        'is_active',
    ];

    protected $casts = [
        'person_type' => PersonType::class,
        'gender' => Gender::class,
        'birth_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function baptism()
    {
        return $this->hasOne(Baptism::class);
    }
}
