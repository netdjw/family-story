<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;



    public function persons() {
        return $this->morphedByMany(Person::class, 'tagable');
    }
}
