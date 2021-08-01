<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail(Request $request)
    {
        $home_url = url('/jobs');
        $job_id = $request->job_id;
        $job_slug = $request->job_slug;

        $job_url = $home_url.'/'.$job_id.'/'.$job_slug;

        $data = array(
            'your_name' => $request->your_name,
            'your_email' => $request->your_email,
            'friend_name' => $request->friend_name,
            'job_url' => $job_url
        );

        $friend_email = $request->friend_email;
        try {
            Mail::to($friend_email)->send(new SendJob($data));
            return redirect()->back()->with('success', 'Job Sent Successfully to '. $friend_email);
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', 'Sorry, something went wrong. Please try again later.');
        }

    }
}
