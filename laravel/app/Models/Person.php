<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_prefix',
        'last_name',
        'middle_name',
        'family_name',
        'name_postfix',
        'nick_name',
        'previous_family_name',
        'birth_date',
        'birth_place',
        'death_date',
        'death_place',
        'death_reason',
        'burial_place',
        'sex',
        'religion_id',
        'nationality_id',
        'height',
        'weight',
        'hair_color',
        'eye_color',
        'description',
        'medical_information',
        'research_status_id',
        'mother_id',
        'father_id',
    ];


    public function mother() {
        return $this->belongsTo(Person::class, 'id', 'mother_id');
    }

    public function father() {
        return $this->belongsTo(Person::class, 'id', 'father_id');
    }

    public function parents() {
        return Person::orWhere([
            ['id', '=', $this->mother_id],
            ['id', '=', $this->father_id],
        ]);
    }

    public function children() {
        return Person::orWhere([
            ['mother_id', '=', $this->id],
            ['father_id', '=', $this->id],
        ]);
    }

    public function addresses() {
        return $this->belongsToMany(Address::class, 'person_addresses', 'person_id', 'address_id');
    }

    public function contacts() {
        return $this->belongsToMany(Contact::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function lifeEvents() {
        return $this->belongsToMany(LifeEvent::class);
    }

    public function notes() {
        return $this->morphToMany(Note::class, 'noteable');
    }

    public function professions() {
        return $this->belongsToMany(Profession::class);
    }

    public function siblings() {
        return Person::where([
            ['mother_id', '=', $this->mother_id],
            ['father_id', '=', $this->father_id],
        ]);
    }

    public function spouses() {
        return $this->hasManyThrough(Person::class, Spouse::class, 'person_id', 'spouse_id');
    }

    public function stepBrothers() {
        return Person::orWhere([
            ['mother_id', '=', $this->mother_id],
            ['father_id', '=', $this->father_id],
        ]);
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'tagable');
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
