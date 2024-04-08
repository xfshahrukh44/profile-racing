<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GlobalMember;
use Illuminate\Http\Request;
use Image;
use File;

class GlobalMemberController extends Controller
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
//        $model = str_slug('globalmember','-');
//        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25000;

            if (!empty($keyword)) {
                $globalmember = GlobalMember::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('twitter', 'LIKE', "%$keyword%")
                ->orWhere('instagram', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $globalmember = GlobalMember::paginate($perPage);
            }

            return view('global-member.global-member.index', compact('globalmember'));
//        }
////        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('global-member.global-member.create');
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
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);

            $globalmember = new GlobalMember($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $globalmember_path = 'uploads/globalmembers/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($globalmember_path) . DIRECTORY_SEPARATOR. $profileImage);

                $globalmember->image = $globalmember_path.$profileImage;
            }

            $globalmember->save();
            return redirect()->back()->with('message', 'GlobalMember added!');
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
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $globalmember = GlobalMember::findOrFail($id);
            return view('global-member.global-member.show', compact('globalmember'));
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
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $globalmember = GlobalMember::findOrFail($id);
            return view('global-member.global-member.edit', compact('globalmember'));
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
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $globalmember = GlobalMember::where('id', $id)->first();
            $image_path = public_path($globalmember->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/globalmembers/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/globalmembers/'.$fileNameToStore;
        }


            $globalmember = GlobalMember::findOrFail($id);
            $globalmember->update($requestData);
            return redirect()->back()->with('message', 'GlobalMember updated!');
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
        $model = str_slug('globalmember','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            GlobalMember::destroy($id);
            return redirect()->back()->with('message', 'GlobalMember deleted!');
        }
//        return response(view('403'), 403);

    }
}
