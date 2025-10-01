<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Models\Subcategory;
use App\Models\Childsubcategory;
use App\orders;
use App\orders_products;
use App\Product;
use App\imagetable;
use App\Attributes;
use App\AttributeValue;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Image;
use File;
use DB;
use Session;

class BundleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

        $logo = imagetable::
            select('img_path')
            ->where('table_name', '=', 'logo')
            ->first();

        $favicon = imagetable::
            select('img_path')
            ->where('table_name', '=', 'favicon')
            ->first();

        View()->share('logo', $logo);
        View()->share('favicon', $favicon);

    }

    public function index(Request $request)
    {
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
            $keyword = $request->get('search');
            // $perPage = 25;

            if (!empty($keyword)) {
                $product = Product::where('products.product_title', 'LIKE', "%$keyword%")
                    ->leftjoin('categories', 'products.category', '=', 'categories.id')
                    ->orWhere('products.description', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                // $product = Product::paginate($perPage);
                $product = Product::all();
            }

            return view('admin.bundleproduct.index', compact('product'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'add-' . $model)->first() != null) {

            $att = Attributes::all();
            $attval = AttributeValue::all();

            $items = Category::all(['id', 'name']);
            $allProducts = Product::where('type', 'simple')->get();
            // $items = Category::pluck('name', 'id');
            // dd($items);
            return view('admin.bundleproduct.create', compact('items', 'att', 'attval', 'allProducts'));
        }
        return response(view('403'), 403);
    }

    public function set_sub_category()
    {

        $get_id = $_GET['get_id'];

        //  dd("Hello");

        $getsub_category = Subcategory::where(['category' => $get_id])->get();

        //    dd($getsub_category);

        return response()->json(['status' => 'true', 'message' => 'subcategory', 'getsub_category' => $getsub_category]);

    }

    public function set_child_sub_category()
    {

        $get_child_id = $_GET['get_child_id'];

        //  dd($get_child_id);

        $get_child_sub_category = Childsubcategory::where(['subcategory' => $get_child_id])->get();

        //    dd($get_child_sub_category);

        return response()->json(['status' => 'true', 'message' => 'subcategory', 'get_child_sub_category' => $get_child_sub_category]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'add-' . $model)->first() != null) {
            $this->validate($request, [
                'product_title' => 'required',
                'price' => 'required',
                'image' => 'required',
                'type' => 'required|in:simple,bundle',
                'bundle_items' => 'required_if:type,bundle|array|min:1',
                'bundle_items.*.product_id' => 'required_if:type,bundle|exists:products,id',
                'bundle_items.*.quantity' => 'required_if:type,bundle|integer|min:1'
            ]);

            $product = new Product;

            $product->category = $request->input('category');
            $product->subcategory = $request->input('subcategory');
            $product->childsubcategory = $request->input('childsubcategory');
            $product->product_title = $request->input('product_title');
            $product->sku = $request->input('sku');
            $product->price = $request->input('price');
            $product->maximum_price = $request->input('maximum_price');
            $product->tags = $request->input('tags');
            $product->description = $request->input('description');
            $product->additional_information = $request->input('additional_information');
            $product->type = $request->input('type');

            $file = $request->file('image');

            $destination_path = 'uploads/products/';
            $profileImage = date("Ymdhis") . "." . $file->getClientOriginalExtension();
            file_put_contents((public_path($destination_path) . $profileImage), file_get_contents($file));

            $product->image = $destination_path . $profileImage;
            $product->save();


            if (!is_null(request('images'))) {
                $photos = request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';
                    $filename = date("Ymdhis") . uniqid() . "." . $photo->getClientOriginalExtension();

                    file_put_contents((public_path($destinationPath) . $filename), file_get_contents($photo));

                    DB::table('product_imagess')->insert([
                        ['image' => $destinationPath . $filename, 'product_id' => $product->id]
                    ]);
                }
            }

            if ($product->type === 'bundle') {
                if ($request->has('bundle_items')) {
                    $totalBundlePrice = 0;

                    foreach ($request->bundle_items as $item) {
                        $individualProduct = Product::find($item['product_id']);
                        $itemTotal = $individualProduct->price * $item['quantity'];
                        $totalBundlePrice += $itemTotal;

                        DB::table('bundle_items')->insert([
                            'bundle_id' => $product->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                }
            }

            return redirect('admin/bundleproduct')->with('message', 'Product added!');
        }
        return response(view('403'), 403);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'view-' . $model)->first() != null) {
            $product = Product::findOrFail($id);
            return view('admin.bundleproduct.show', compact('product'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'edit-' . $model)->first() != null) {

            $att = Attributes::all();
            $product = Product::findOrFail($id);

            // $items = Category::pluck('name', 'id');
            $items = Category::all(['id', 'name']);

            $product_images = DB::table('product_imagess')
                ->where('product_id', $id)
                ->get();

            return view('admin.bundleproduct.edit', compact('product', 'items', 'product_images', 'att'));
        }
        return response(view('403'), 403);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        dd($request->all());
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'edit-' . $model)->first() != null) {
            $this->validate($request, [
                'product_title' => 'required',
            ]);


            if ($request->input('category') != "0") {
                $requestData['category'] = $request->input('category');
            }

            if ($request->input('subcategory') != "") {
                $requestData['subcategory'] = $request->input('subcategory');
            }


            if ($request->input('childsubcategory') != "") {
                $requestData['childsubcategory'] = $request->input('childsubcategory');
            }



            $requestData['product_title'] = $request->input('product_title');
            $requestData['description'] = $request->input('description');
            $requestData['additional_information'] = $request->input('additional_information');
            $requestData['sku'] = $request->input('sku');
            $requestData['price'] = $request->input('price');
            $requestData['maximum_price'] = $request->input('maximum_price');
            $requestData['tags'] = $request->input('tags');




            // dump($request->input());
            // die();
            /*Insert your data*/

            // Detail::insert( [
            // 'images'=>  implode("|",$images),
            // ]);

            if ($request->hasFile('image')) {

                $product = product::where('id', $id)->first();
                $image_path = public_path($product->image);

                if (File::exists($image_path)) {

                    File::delete($image_path);
                }

                $file = $request->file('image');
                $fileNameExt = $request->file('image')->getClientOriginalName();
                $fileNameForm = str_replace(' ', '_', $fileNameExt);
                $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
                $fileExt = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                $pathToStore = public_path('uploads/products/');
                //            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);
                file_put_contents(($pathToStore . $fileNameToStore), file_get_contents($file));

                $requestData['image'] = 'uploads/products/' . $fileNameToStore;
            }

            if (!is_null(request('images'))) {

                $photos = request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $filename = date("Ymdhis") . uniqid() . "." . $photo->getClientOriginalExtension();
                    //dd($photo,$filename);
//                    Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);
                    file_put_contents((public_path($destinationPath) . $filename), file_get_contents($photo));

                    $product = product::where('id', $id)->first();

                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath . $filename, 'product_id' => $product->id]

                    ]);

                }

            }

            product::where('id', $id)
                ->update($requestData);


            $attval = $request->attribute;
            //            $product_attribute_id = $request->product_attribute;
//            $oldatt = $request->attribute_id;
//            $oldval = $request->value;
//            $oldprice = $request->v_price;
//            $oldqty = $request->qty;
//
//            for($j = 0; $j < count((array)$oldatt); $j++){
//                $product_attribute = ProductAttribute::find($product_attribute_id[$j]);
//                $product_attribute->attribute_id = $oldatt[$j];
//                $product_attribute->value = $oldval[$j];
//                $product_attribute->price = $oldprice[$j];
//                $product_attribute->qty = $oldqty[$j];
//                $product_attribute->save();
//            }
//
            //create new attributes
            for ($i = 0; $i < count((array) $attval); $i++) {
                $product_attributes = new ProductAttribute;
                $product_attributes->attribute_id = $attval[$i]['attribute_id'];
                $product_attributes->value = $attval[$i]['value'];
                $product_attributes->price = $attval[$i]['v-price'];
                $product_attributes->qty = $attval[$i]['qty'];
                $product_attributes->product_id = $id;
                $product_attributes->save();
            }

            //update old attributes
            if ($request->has('product_attribute')) {
                $count = 0;
                foreach ($request->get('product_attribute') as $product_attribute_id) {
                    if ($product_attribute = ProductAttribute::find($product_attribute_id)) {
                        $product_attribute->qty = $request->get('qty')[$count] ?? 0;
                        $product_attribute->price = $request->get('v_price')[$count] ?? 0;
                        $product_attribute->save();
                    }

                    $count += 1;
                }
            }

            /*
           if(! is_null(request('images'))) {


                   DB::table('product_imagess')->where('product_id', '=', $id)->delete();

                   $photos=request()->file('images');



                   foreach ($photos as $photo) {
                       $destinationPath = 'uploads/products/';

                       $fileName = uniqid() . "_" . $file->getClientOriginalName();
                       $file->move(storage_path($destinationPath), $fileName);


                       DB::table('product_imagess')->insert([

                           ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                       ]);

                   }

           }
           */


            return redirect('admin/bundleproduct')->with('message', 'Product updated!');
        }
        return response(view('403'), 403);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = str_slug('product', '-');
        if (auth()->user()->permissions()->where('name', '=', 'delete-' . $model)->first() != null) {
            Product::destroy($id);

            return redirect('admin/bundleproduct')->with('flash_message', 'Product deleted!');
        }
        return response(view('403'), 403);

    }

    public function orderList()
    {

        $orders = orders::
            select('orders.*')
            ->get();

        return view('admin.ecommerce.order-list', compact('orders'));
    }

    public function orderListDetail($id)
    {

        $order_id = $id;
        $order = orders::where('id', $order_id)->first();
        $order_products = orders_products::where('orders_id', $order_id)->get();



        return view('admin.ecommerce.order-page')->with('title', 'Invoice #' . $order_id)->with(compact('order', 'order_products'))->with('order_id', $order_id);

        // return view('admin.ecommerce.order-page');
    }

    public function updatestatuscompleted($id)
    {

        $order_id = $id;
        $order = DB::table('orders')
            ->where('id', $id)
            ->update(['order_status' => 'Completed']);


        Session::flash('message', 'Order Status Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();

    }
    public function updatestatusPending($id)
    {

        $order_id = $id;
        $order = DB::table('orders')
            ->where('id', $id)
            ->update(['order_status' => 'Pending']);


        Session::flash('message', 'Order Status Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();

    }
}
