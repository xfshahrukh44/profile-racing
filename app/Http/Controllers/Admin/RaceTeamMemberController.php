<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RaceTeamMember;
use Illuminate\Http\Request;
use Image;
use File;

class RaceTeamMemberController extends Controller
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
        $model = str_slug('raceteammember','-');
//        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $raceteammember = RaceTeamMember::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('twitter', 'LIKE', "%$keyword%")
                ->orWhere('instagram', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $raceteammember = RaceTeamMember::paginate($perPage);
            }

            return view('race-team-member.race-team-member.index', compact('raceteammember'));
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('race-team-member.race-team-member.create');
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);

            $raceteammember = new RaceTeamMember($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $raceteammember_path = 'uploads/raceteammembers/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($raceteammember_path) . DIRECTORY_SEPARATOR. $profileImage);

                $raceteammember->image = $raceteammember_path.$profileImage;
            }

            $raceteammember->save();
            return redirect()->back()->with('message', 'RaceTeamMember added!');
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $raceteammember = RaceTeamMember::findOrFail($id);
            return view('race-team-member.race-team-member.show', compact('raceteammember'));
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $raceteammember = RaceTeamMember::findOrFail($id);
            return view('race-team-member.race-team-member.edit', compact('raceteammember'));
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $raceteammember = RaceTeamMember::where('id', $id)->first();
            $image_path = public_path($raceteammember->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/raceteammembers/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/raceteammembers/'.$fileNameToStore;
        }


            $raceteammember = RaceTeamMember::findOrFail($id);
            $raceteammember->update($requestData);
            return redirect()->back()->with('message', 'RaceTeamMember updated!');
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
        $model = str_slug('raceteammember','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            RaceTeamMember::destroy($id);
            return redirect()->back()->with('message', 'RaceTeamMember deleted!');
        }
//        return response(view('403'), 403);

    }
}
