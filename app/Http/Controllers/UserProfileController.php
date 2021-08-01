<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['seeker', 'verified']);
    }

    public function index(){
        return view('profile.index');
    }

    public function profileSeekerUpdate(Request $request){
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required|numeric',
            'experience' => 'required|min:10',
            'biography' => 'required|min:10',


        ]);

        $user_id = Auth::user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => Str::title($request->address),
            'phone' => $request->phone,
            'experience' => $request->experience,
            'biography' => $request->biography
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully');

    }

    public function profileSeekerCover(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:doc,pdf,docx'
        ]);

        $user_id = Auth::user()->id;
        $file_path = 'docs/';
        if (Auth::user()->profile->cover_letter){
            unlink(Auth::user()->profile->cover_letter);
        }
        $file = $request->file('cover_letter');
        $file_name = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($file_path, $file_name);
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $file_path.$file_name,
        ]);
        return redirect()->back()->with('success', 'Cover letter updated successfully');

    }

    public function profileSeekerResume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:doc,pdf,docx'
        ]);

        $user_id = Auth::user()->id;
        $file_path = 'docs/';
        if (Auth::user()->profile->resume){
            unlink(Auth::user()->profile->resume);
        }
        $file = $request->file('resume');
        $file_name = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($file_path, $file_name);
        Profile::where('user_id', $user_id)->update([
            'resume' => $file_path.$file_name,
        ]);
        return redirect()->back()->with('success', 'Resume updated successfully');
    }

    public function profileSeekerAvatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|dimensions:min_width=180,min_height=180|mimes:png,jpeg'
        ]);

        $user_id = Auth::user()->id;
        $file_path = 'avatar/';
        if (Auth::user()->profile->avatar){
            unlink(Auth::user()->profile->avatar);
        }
        $file = $request->file('avatar');
        $file_name = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        $file->move($file_path, $file_name);
        Profile::where('user_id', $user_id)->update([
            'avatar' => $file_path.$file_name,
        ]);
        return redirect()->back()->with('success', 'Avatar updated successfully');
    }


}
