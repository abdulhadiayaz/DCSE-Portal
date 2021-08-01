<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except'=>['show', 'company']]);
    }

    public function show($id, $slug){
        $company = Company::whereId($id)->where('slug',$slug)->first();
        return view('companies.show', compact('company'));
    }

    public function company(){
        $companies = Company::paginate(12);
        return view('companies.companies', compact('companies'));
    }

    public function companyProfile(){
        return view('companies.profile');
    }

    public function companyProfileUpdate(CompanyRequest $request){
        $user_id = Auth::id();
        Company::where('user_id', $user_id)->update($request->except('_token'));
        return redirect()->back()->with('success', 'Updated with success');
    }

    public function companyProfileCover(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpeg,png'
        ]);

        if (Auth::user()->company->cover_photo){
            unlink(Auth::user()->company->cover_photo);
        }
        $user_id = Auth::id();
        $image_path = 'cover/';
        $file = $request->file('cover_photo');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($image_path,$filename);
        Company::where('user_id', $user_id)->update([
            'cover_photo' => $image_path.$filename
        ]);
        return redirect()->back()->with('success', 'Cover Photo Updated with Success');
    }

    public function companyProfileLogo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpeg,png'
        ]);

        if (Auth::user()->company->logo){
            unlink(Auth::user()->company->logo);
        }
        $user_id = Auth::id();
        $image_path = 'avatar/';
        $file = $request->file('logo');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($image_path,$filename);
        Company::where('user_id', $user_id)->update([
            'logo' => $image_path.$filename
        ]);
        return redirect()->back()->with('success', 'Logo Updated with Success');
    }

}
