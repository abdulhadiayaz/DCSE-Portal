<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['seeker', 'verified']);
    }

    public function saveJob($id){
        $job = Job::findOrFail($id);
        $job->favourites()->attach(Auth::id());
    }

    public function unSaveJob($id){
        $job = Job::findOrFail($id);
        $job->favourites()->detach(Auth::id());
    }

}
