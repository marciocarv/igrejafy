<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'name',
        'legal_name',
        'slug',

        'cnpj',

        'email',
        'phone',
        'website',

        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'zip_code',
        'country',

        'logo',
        'favicon',

        'timezone',
        'locale',
        'currency',

        'plan_id',
        'subscription_status',
        'trial_ends_at',
        'subscription_ends_at',

        'settings',

        'is_active',
    ];

    protected $casts = [

        'settings' => 'array',

        'trial_ends_at' => 'datetime',

        'subscription_ends_at' => 'datetime',

        'is_active' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
