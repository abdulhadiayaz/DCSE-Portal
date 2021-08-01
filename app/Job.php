<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Job extends Model
{
    //
    protected $fillable = [
        'user_id',
        'company_id',
        'category_id',
        'title',
        'slug',
        'description',
        'position',
        'address',
        'type',
        'roles',
        'status',
        'deadline',
        'number_of_vacancy',
        'experience',
        'gender',
        'salary'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function checkApplication(){
        return DB::table('job_user')->where('user_id', Auth::id())
                                        ->where('job_id', $this->id)->exists();
    }

    public function checkSaved(){
        return Favourite::where('user_id', Auth::id())
            ->where('job_id', $this->id)->exists();
    }

    public function getTitleAttribute($value){
        return Str::title($value);
    }

    public function getAddressAttribute($value){
        return Str::title($value);
    }

    public function setTypeAttribute($value){
        $this->attributes['type'] = Str::title($value);
    }

    public function getPositionAttribute($value){
        return Str::title($value);
    }

    public function getGenderAttribute($value){
        return Str::title($value);
    }

    public function getSalaryAttribute($value){
//        return number_format($value, 2,'.', ',').'€';
        if(is_numeric($value)){
            return number_format($value).'€';
        } else{
            return 'Negociable';
        }
    }

    public function favourites(){
        return $this->belongsToMany(Job::class, 'favourites', 'job_id', 'user_id')->withTimestamps();
    }

}
