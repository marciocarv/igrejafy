<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use SoftDeletes;

class Baptism extends Model
{
    protected $fillable = [

    'person_id',

    'baptism_date',

    'church_name',

    'pastor_name',

    'city',

    'state',

    'certificate_book',

    'certificate_page',

    'certificate_number',

    'notes',

    ];

    protected $casts = [

        'baptism_date' => 'date',

    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

}
