<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'gender',
        'date_of_birth',
        'experience',
        'biography',
        'cover_letter',
        'resume',
        'avatar',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getGenderAttribute($value){
        return ucfirst($value);
    }

    public function getExperienceAttribute($value){
        return ucfirst($value);
    }

    public function getBiographyAttribute($value){
        return ucfirst($value);
    }

    public function getAddressAttribute($value){
        return Str::title($value);
    }



}
