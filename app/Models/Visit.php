<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'person_id',
        'visit_date',
        'notes',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
