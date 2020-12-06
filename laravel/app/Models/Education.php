<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'qualification',
        'started_at',
        'finished_at',
        'institution_name',
    ];
}
