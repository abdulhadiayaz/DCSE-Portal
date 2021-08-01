<?php

namespace App\Http\Controllers;

use App\Advisor;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HelperRegisterController extends Controller
{
    //
//    public function helperRegister(array $data){
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'gender' => 'required|in:male,female',
//            'date_of_birth' => 'required'
//        ]);
//    }


    protected function helperRegister(Request $request)
    {
        $this->validate($request, [
            'advisor_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => Str::title($request->advisor_name),
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        Advisor::create([
            'user_id' => $user->id,
            'advisor_name' => $request->advisor_name,
            'slug' => Str::slug($request->advisor_name),
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('info', 'Please verify your email by clicking the link sent to your email address.');
    }
}
