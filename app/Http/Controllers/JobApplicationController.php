<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;

class JobApplicationController extends Controller
{
    public function submitJobApplication (Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
//            'url' => 'required',
//            'cover_letter' => 'required',
            'resume' => 'required',
        ]);

        $job_application = JobApplication::create($request->except('cover_letter'));

        if ($request->hasFile('resume')) {

            $file = $request->file('resume');

            //make sure yo have resume folder inside your public
            $job_application_path = 'uploads/job_applications/';
            $fileName = $file->getClientOriginalName();
            $profileImage = date("Ymd").".".$file->getClientOriginalExtension();
            $file->move(public_path($job_application_path), $profileImage);
//            Image::make($file)->save(public_path($job_application_path) . DIRECTORY_SEPARATOR. $profileImage);

            $job_application->resume = $job_application_path . $profileImage;
            $job_application->save();
        }

        $data = [
            'job_id' => $request->job_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'resume_path' => $resumePath,
        ];

        // Send the email
        Mail::send([], [], function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('New Job Application Submission')
                ->html(
                    '<p>Job ID: ' . $data['job_id'] . '</p>' .
                    '<p>Name: ' . $data['first_name'] . ' ' . $data['last_name'] . '</p>' .
                    '<p>Email: ' . $data['email'] . '</p>' .
                    '<p>Resume: <a href="' . $data['resume_path'] . '">Download</a></p>',
                    'text/html'
                );
        });

        Session::flash('message', 'Job application submitted!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();


    }
}
