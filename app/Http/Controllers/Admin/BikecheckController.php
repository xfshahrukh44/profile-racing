<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Bikecheck;
use Illuminate\Http\Request;
use Image;
use File;

class BikecheckController extends Controller
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $bikecheck = Bikecheck::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $bikecheck = Bikecheck::paginate($perPage);
            }

            return view('bikecheck.bikecheck.index', compact('bikecheck'));
        }
//        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('bikecheck.bikecheck.create');
        }
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);

            $bikecheck = new Bikecheck($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $bikecheck_path = 'uploads/bikechecks/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($bikecheck_path) . DIRECTORY_SEPARATOR. $profileImage);

                $bikecheck->image = $bikecheck_path.$profileImage;
            }

            $bikecheck->save();
            return redirect()->back()->with('message', 'Bikecheck added!');
        }
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $bikecheck = Bikecheck::findOrFail($id);
            return view('bikecheck.bikecheck.show', compact('bikecheck'));
        }
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $bikecheck = Bikecheck::findOrFail($id);
            return view('bikecheck.bikecheck.edit', compact('bikecheck'));
        }
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);
            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $bikecheck = Bikecheck::where('id', $id)->first();
            $image_path = public_path($bikecheck->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/bikechecks/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/bikechecks/'.$fileNameToStore;
        }


            $bikecheck = Bikecheck::findOrFail($id);
            $bikecheck->update($requestData);
            return redirect()->back()->with('message', 'Bikecheck updated!');
        }
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
        $model = str_slug('bikecheck','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Bikecheck::destroy($id);
            return redirect()->back()->with('message', 'Bikecheck deleted!');
        }
//        return response(view('403'), 403);

    }
}
