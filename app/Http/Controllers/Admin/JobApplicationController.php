<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Image;
use File;

class JobApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $job_applications = JobApplication::where('first_name', 'LIKE', "%$keyword%")
            ->orWhere('last_name', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $job_applications = JobApplication::paginate($perPage);
        }

        return view('job-application.job-application.index', compact('job_applications'));

//        }
//        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
//        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
//            return view('job.job.create');
//        }
//        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
//            $this->validate($request, [
//			'title' => 'required',
//			'location' => 'required',
//			'description' => 'required'
//		]);
//
//            $job = new JobApplication($request->all());
//
//            if ($request->hasFile('image')) {
//
//                $file = $request->file('image');
//
//                //make sure yo have image folder inside your public
//                $job_path = 'uploads/jobs/';
//                $fileName = $file->getClientOriginalName();
//                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();
//
//                Image::make($file)->save(public_path($job_path) . DIRECTORY_SEPARATOR. $profileImage);
//
//                $job->image = $job_path.$profileImage;
//            }
//
//            $job->save();
//            return redirect()->back()->with('message', 'JobApplication added!');
//        }
//        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
//        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
//            $job = JobApplication::findOrFail($id);
//            return view('job.job.show', compact('job'));
//        }
//        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
//        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
//            $job = JobApplication::findOrFail($id);
//            return view('job.job.edit', compact('job'));
//        }
//        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
//        $model = str_slug('job','-');
//        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
//            $this->validate($request, [
//			'title' => 'required',
//			'location' => 'required',
//			'description' => 'required'
//		]);
//            $requestData = $request->all();
//
//
//        if ($request->hasFile('image')) {
//
//            $job = JobApplication::where('id', $id)->first();
//            $image_path = public_path($job->image);
//
//            if(File::exists($image_path)) {
//                File::delete($image_path);
//            }
//
//            $file = $request->file('image');
//            $fileNameExt = $request->file('image')->getClientOriginalName();
//            $fileNameForm = str_replace(' ', '_', $fileNameExt);
//            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
//            $fileExt = $request->file('image')->getClientOriginalExtension();
//            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
//            $pathToStore = public_path('uploads/jobs/');
//            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);
//
//             $requestData['image'] = 'uploads/jobs/'.$fileNameToStore;
//        }
//
//
//            $job = JobApplication::findOrFail($id);
//            $job->update($requestData);
//            return redirect()->back()->with('message', 'JobApplication updated!');
//        }
//        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('job','-');

        $job_application = JobApplication::find($id);

        $resume_path = public_path($job_application->resume);
        if(File::exists($resume_path)) {
            File::delete($resume_path);
        }

        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            JobApplication::destroy($id);
            return redirect()->back()->with('message', 'JobApplication deleted!');
        }
        return response(view('403'), 403);

    }
}
