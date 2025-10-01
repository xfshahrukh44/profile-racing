<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use Image;
use File;

class CategoryController extends Controller
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $category = Category::where('name', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                $category = Category::paginate($perPage);
            }

            return view('admin.category.index', compact('category'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'add-' . $model)->first() != null) {
            return view('admin.category.create');
        }
        return response(view('403'), 403);
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'add-' . $model)->first() != null) {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $requestData = $request->all();
            // agar price_increment empty aaye to null set karo
            $requestData['price_increment'] = $request->input('price_increment') ?: null;

            if ($request->hasFile('image')) {
                $category = new Category;

                $file = $request->file('image');
                $destination_path = 'uploads/categorys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd") . $fileName . "." . $file->getClientOriginalExtension();

                Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR . $profileImage);

                $category->image = $destination_path . $profileImage;
                $category->save();
            }

            $incrementPercent = $category->price_increment;
            if ($incrementPercent) {
                foreach ($category->subcategories as $sub) {
                    foreach ($sub->childsubcategories as $child) {
                        foreach ($child->products as $product) {
                            $product->price += ($product->price * $incrementPercent / 100);
                            $product->save();
                        }
                    }
                }
            }

            return redirect('admin/category')->with('flash_message', 'Category added!');
        }
        return response(view('403'), 403);
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
            $category = Category::findOrFail($id);
            return view('admin.category.show', compact('category'));
        }
        return response(view('403'), 403);
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'edit-' . $model)->first() != null) {
            $category = Category::findOrFail($id);
            return view('admin.category.edit', compact('category'));
        }
        return response(view('403'), 403);
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'edit-' . $model)->first() != null) {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $requestData = $request->all();
            $requestData['price_increment'] = $request->input('price_increment') ?: null;

            if ($request->hasFile('image')) {
                $category = Category::where('id', $id)->first();
                $image_path = public_path($category->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $file = $request->file('image');
                $fileNameExt = $request->file('image')->getClientOriginalName();
                $fileNameForm = str_replace(' ', '_', $fileNameExt);
                $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
                $fileExt = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                $pathToStore = public_path('uploads/categorys/');
                Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR . $fileNameToStore);

                $requestData['image'] = 'uploads/categorys/' . $fileNameToStore;
            }

            $category = Category::findOrFail($id);
            $category->update($requestData);

            // ✅ yahan price increment apply karna
            $incrementPercent = $category->price_increment;
            if ($incrementPercent) {
                foreach ($category->subcategories as $sub) {
                    foreach ($sub->childsubcategories as $child) {
                        foreach ($child->products as $product) {
                            $product->price += ($product->price * $incrementPercent / 100);
                            $product->save();
                        }
                    }
                }
            }

            return redirect('admin/category')->with('flash_message', 'Category updated!');
        }
        return response(view('403'), 403);
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
        $model = str_slug('category', '-');
        if (auth()->user()->permissions()->where('name', '=', 'delete-' . $model)->first() != null) {
            Category::destroy($id);

            return redirect('admin/category')->with('flash_message', 'Category deleted!');
        }
        return response(view('403'), 403);
    }
}
