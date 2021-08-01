<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except'=>['index', 'show', 'apply', 'allJobs', 'searchJobs']]);
    }

    public function index(){
        $jobs = Job::latest()->where('status', 1)->whereDate('deadline','>',date('Y-F-d'))->limit(10)->get();
        $categories = Category::with('jobs')->get();
//        $companies = Company::all()->random(8);
        return view('welcome', compact('jobs', 'categories'));
    }

    public function show($id, $job){
        $job = Job::whereId($id)->where('slug', $job)->first();

        $data = array();
        $jobsBasedOnCategories = Job::latest()
            ->where('category_id', $job->category_id)
            ->whereDate('deadline','>',date('Y-F-d'))
            ->where('id', "!=", $job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        $jobsBasedOnCompanies = Job::latest()
            ->where('company_id', $job->company_id)
            ->whereDate('deadline','>',date('Y-F-d'))
            ->where('id', "!=", $job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        $jobsBasedOnPositions = Job::latest()
            ->where('position', 'LIKE', '%'.$job->position.'%')
            ->whereDate('deadline','>',date('Y-F-d'))
            ->where('id', "!=", $job->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $jobsBasedOnCategories, $jobsBasedOnCompanies, $jobsBasedOnPositions);
        // Converts this array into a collection
        $collection = collect($data);
        // Here i am removing duplicated jobs based on the id
        $unique = $collection->collapse(); // collapse()
        $jobRecommendations = $unique->values()->all();
        return view('jobs.show', compact('job', 'jobRecommendations'));

    }

    public function myJobs(){
        $jobs = Job::where('company_id', Auth::user()->company->id)->paginate(10);
        return view('jobs.my-jobs', compact('jobs'));
    }

    public function create(){
        $categories = Category::orderBy('name', 'asc')->get();
        return view('jobs.create', compact('categories'));
    }

    public function edit($id, $slug){
        $job = Job::where('id', $id)->where('slug', $slug)->first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function store(JobRequest $request){
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $inputs['company_id'] = Auth::user()->company->id;
        $inputs['slug'] = Str::slug($request->title);
        Job::create($inputs);
        return redirect()->back()->with('success', 'Job Created with Success');
    }

    public function update(JobRequest $request){
        $job = Job::where('user_id', Auth::id())->whereId($request->id)->first();
        $inputs = $request->except('id');
        $inputs['slug'] = Str::slug($request->title);
        $job->update($inputs);
        return redirect()->back()->with('success', 'Job Updated with Success');
    }

    public function apply($id){
        $user_id = Auth::id();
        $job = Job::findOrFail($id);
        $job->users()->attach($user_id);
    }

    public function applicants(){
        $jobs = Job::with('users')->where('user_id', Auth::id())->get();
        return view('jobs.applicants', compact('jobs'));
    }

    public function allJobs(Request $request){

        // front search
        $search = $request->search;
        $address = $request->address;
        if ($search || $address){
            $jobs = Job::with('company')->where('position', 'LIKE', '%'.$search.'%')
                ->orWhere('title','like', '%'.$search.'%' )
                ->orWhere('type','like', '%'.$search.'%' )
                ->orWhere('address','like', '%'.$search.'%' )
                ->paginate(10);
            return view('jobs.all-jobs', compact('jobs'));
        }
        else{

            $keyword = $request->title;
            $type = $request->type;
            $category = $request->category_id;
            $address = $request->address;

            if ($keyword){
                $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')->where('status', 1)->paginate(10);
            }
            elseif ($type){
                $jobs = Job::where('type', $type)->where('status', 1)->paginate(10);
            }
            elseif ($category){
                $jobs = Job::where('category_id', $category)->where('status', 1)->paginate(10);
            }
            elseif ($address){
                $jobs = Job::where('address', 'LIKE', '%'.$address.'%')->where('status', 1)->paginate(10);
            }
            else{
                $jobs = Job::latest()->where('status', 1)->paginate(10);
            }

            return view('jobs.all-jobs', compact('jobs'));
        }

    }

    public function searchJobs(Request $request){
        $keyword = $request->keyword;
        $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('position', 'LIKE', '%'.$keyword.'%')
                    ->limit(5)->get();
        return response()->json($jobs);
    }

}
