<?php

namespace App\Http\Controllers;

use App\Company;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegisterController extends Controller
{
    //
//    public function employerRegister(array $data){
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'gender' => 'required|in:male,female',
//            'date_of_birth' => 'required'
//        ]);
//    }


    protected function employerRegister(Request $request)
    {
        $this->validate($request, [
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => Str::title($request->company_name),
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        Company::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'slug' => Str::slug($request->company_name),
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('info', 'Please verify your email by clicking the link sent to your email address.');
    }
}
