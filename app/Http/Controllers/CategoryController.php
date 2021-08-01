<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($id){
        $jobs = Job::whereCategoryId($id)->paginate(10);
        $category = Category::findOrFail($id);
        return view('jobs.category', compact('category', 'jobs'));
    }
}
