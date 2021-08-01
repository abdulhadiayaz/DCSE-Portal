<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    //
    protected $fillable = [
        'user_id',
        'company_name',
        'slug',
        'address',
        'phone',
        'website',
        'logo',
        'cover_photo',
        'slogan',
        'description'
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCompanyNameAttribute($value){
        return Str::title($value);
    }


}
