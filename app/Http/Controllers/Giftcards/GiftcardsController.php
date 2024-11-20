<?php

namespace App\Http\Controllers\Giftcards;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Giftcard;
use Illuminate\Http\Request;
use Image;
use File;

class GiftcardsController extends Controller
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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $giftcards = Giftcard::where('code', 'LIKE', "%$keyword%")
            ->orWhere('balance', 'LIKE', "%$keyword%")
            ->orWhere('expiry_date', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $giftcards = Giftcard::paginate($perPage);
        }

        return view('giftcards.giftcards.index', compact('giftcards'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('giftcards.giftcards.create');

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
        $giftcards = new Giftcard($request->all());

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            //make sure yo have image folder inside your public
            $giftcards_path = 'uploads/giftcardss/';
            $fileName = $file->getClientOriginalName();
            $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

            Image::make($file)->save(public_path($giftcards_path) . DIRECTORY_SEPARATOR. $profileImage);

            $giftcards->image = $giftcards_path.$profileImage;
        }

        $giftcards->save();
        return redirect()->back()->with('message', 'Giftcard added!');
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
        $giftcard = Giftcard::findOrFail($id);
        return view('giftcards.giftcards.show', compact('giftcard'));
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
        $giftcard = Giftcard::findOrFail($id);
        return view('giftcards.giftcards.edit', compact('giftcard'));
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
        $requestData = $request->all();

        if ($request->hasFile('image')) {

            $giftcards = Giftcard::where('id', $id)->first();
            $image_path = public_path($giftcards->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/giftcardss/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/giftcardss/'.$fileNameToStore;
        }

        $giftcard = Giftcard::findOrFail($id);
        $giftcard->update($requestData);
        return redirect()->back()->with('message', 'Giftcard updated!');

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
        Giftcard::destroy($id);
        return redirect()->back()->with('message', 'Giftcard deleted!');

    }
}
