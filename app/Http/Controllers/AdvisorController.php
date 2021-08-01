<?php

namespace App\Http\Controllers;

use App\Advisor;
use App\Http\Requests\AdvisorRequest;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvisorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['helper', 'verified'], ['except'=>['show', 'advisor']]);
    }

    public function show($id, $slug){
        $advisor = Advisor::whereId($id)->where('slug',$slug)->first();
        return view('advisors.show', compact('advisor'));
    }

    public function advisor(){
        $advisors = Advisor::paginate(12);
        return view('advisors.advisors', compact('advisors'));
    }

    public function advisorProfile(){
        return view('advisors.profile');
    }

    public function advisorProfileUpdate(AdvisorRequest $request){
        $user_id = Auth::id();
        Advisor::where('user_id', $user_id)->update($request->except('_token'));
        return redirect()->back()->with('success', 'Updated with success');
    }

    public function advisorProfileCover(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpeg,png'
        ]);

        if (Auth::user()->advisor->cover_photo){
            unlink(Auth::user()->advisor->cover_photo);
        }
        $user_id = Auth::id();
        $image_path = 'cover/';
        $file = $request->file('cover_photo');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($image_path,$filename);
        Advisor::where('user_id', $user_id)->update([
            'cover_photo' => $image_path.$filename
        ]);
        return redirect()->back()->with('success', 'Cover Photo Updated with Success');
    }

    public function advisorProfileLogo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpeg,png'
        ]);

        if (Auth::user()->advisor->logo){
            unlink(Auth::user()->advisor->logo);
        }
        $user_id = Auth::id();
        $image_path = 'avatar/';
        $file = $request->file('logo');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($image_path,$filename);
        Advisor::where('user_id', $user_id)->update([
            'logo' => $image_path.$filename
        ]);
        return redirect()->back()->with('success', 'Logo Updated with Success');
    }

}
