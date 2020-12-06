<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'zip',
        'settlement',
        'address_1',
        'address_2',
        'from_date',
        'is_current_address',
    ];

    public function persons() {
        return $this->belongsToMany(Person::class, 'person_addresses', 'address_id', 'person_id');
    }
}
