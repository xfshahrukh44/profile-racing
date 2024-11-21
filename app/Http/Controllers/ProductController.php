<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use SoapClient;
use App\Product;
use App\Category;
use App\Banner;
use App\ProductAttribute;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;
use App\orders;
use App\orders_products;
use App\Models\Discount;
use App\Models\GiftCard;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session as SessionSession;

class ProductController extends Controller
{
	use HelperTrait;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// use Helper;

	public function __construct()
	{
		//$this->middleware('auth');
		$logo = imagetable::select('img_path')
			->where('table_name', '=', 'logo')
			->first();

		$favicon = imagetable::select('img_path')
			->where('table_name', '=', 'favicon')
			->first();

		View()->share('logo', $logo);
		View()->share('favicon', $favicon);
		//View()->share('config',$config);
	}

	public function index()
	{
		$products = new Product;
		if (isset($_GET['q']) && $_GET['q'] != '') {

			$keyword = $_GET['q'];

			$products = $products->where(function ($query)  use ($keyword) {
				$query->where('product_title', 'like', $keyword);
			});
		}
		$products = $products->orderBy('id', 'asc')->get();
		return view('products', ['products' => $products]);
	}

	public function productDetail($id)
	{

		$product = new Product;
		$product_detail = $product->where('id', $id)->first();
		$products = DB::table('products')->get()->take(10);
		return view('product_detail', ['product_detail' => $product_detail, 'products' => $products]);
	}

	public function categoryDetail($id)
	{

		$category = new Category;

		$category = DB::table('products')->where('category', '=', $id)->get()->toArray();
		return view('shop.category_detail', ['category' => $category]);
	}


	public function cart()
	{

		$page = DB::table('pages')->where('id', 2)->first();
		$cartCount = COUNT(Session::get('cart'));
		$language = Session::get('language');
		$product_detail = DB::table('products')->first();
		if (Session::get('cart') && count(Session::get('cart')) > 0) {
			return view('shop.cart', ['cart' => Session::get('cart'), 'language' => $language, 'product_detail' => $product_detail, 'page' => $page]);
		} else {
			Session::flash('flash_message', 'No Product found');
			Session::flash('alert-class', 'alert-success');
			return redirect('/');
		}
	}

	public function saveCart(Request $request)
	{


		$var_item = $request->variation;

		// dd($var_item);

		$result = array();


		$product_detail = DB::table('products')->where('id', $request->product_id)->first();


		$id = isset($request->product_id) ? $request->product_id : '';
		$qty = isset($request->qty) ? intval($request->qty) : '1';

		// dd($qty);

		$cart = array();
		$cartId = $id;
		if (Session::has('cart')) {

			$cart = Session::get('cart');
		}

		$price = $product_detail->price;


		if ($id != "" && intval($qty) > 0) {

			if (array_key_exists($cartId, $cart)) {
				unset($cart[$cartId]);
			}

			$productFirstrow = Product::where('id', $id)->first();


			$cart[$cartId]['id'] = $id;
			$cart[$cartId]['name'] = $productFirstrow->product_title;
			$cart[$cartId]['baseprice'] = $price;
			$cart[$cartId]['qty'] = $qty;
			$cart[$cartId]['variation_price'] = 0;

			foreach ($var_item as $key => $value) {

				$data = ProductAttribute::where('product_id', $_POST['product_id'])->where('value', $value)->first();

				$cart[$cartId]['variation'][$data->id]['attribute'] = 	$data->attribute->name;
				$cart[$cartId]['variation'][$data->id]['attribute_val'] = 	$data->attributesValues->value;
				$cart[$cartId]['variation'][$data->id]['attribute_price'] = 	$data->price;
				$cart[$cartId]['variation_price'] += $data->price;

			}

			// dd($cart);

			Session::put('cart', $cart);

			Session::flash('message', 'Product Added to cart Successfully');
			Session::flash('alert-class', 'alert-success');
//			return redirect('/cart');
			session()->put('added-to-cart', true);
            return redirect()->back();

		} else {

			Session::flash('flash_message', 'Sorry! You can not proceed with 0 quantity');
			Session::flash('alert-class', 'alert-success');
			return back();

		}

	}
	public function updateCart()
	{

		$cart = Session::get('cart');
		$pro_id = $_POST['product_id'];
		$qty = $_POST['qty'];
		$count = 0;
		if (sizeof($_POST['row']) >= 1) {
			foreach ($cart as $key => $value) {
				foreach ($value as $key_item => $value_item) {
					if ($key_item == 'qty') {
						$cart[$key][$key_item] = (int)($_POST['row'][$count]);
					}
				}
				$count = $count + 1;
			}
		}



		// $productFirstrow = Product::where('id', $pro_id)->first();
		// $cart[$pro_id]['id'] = $pro_id;
		// $cart[$pro_id]['name'] = $productFirstrow->product_title;
		// $cart[$pro_id]['baseprice'] = $productFirstrow->price;
		// $cart[$pro_id]['qty'] = $qty;


		$variation_total = 0;
		foreach ($cart[$pro_id]['variation'] as $key => $value) {
			$variation_total += $value['attribute_price'];
		}

		$cart[$pro_id]['variation_price'] = $variation_total * $qty;


		Session::put('cart', $cart);
		Session::flash('message', 'Your Cart Updated Successfully');
		Session::flash('alert-class', 'alert-success');
        session()->put('added-to-cart', true);
		return redirect('/checkout');
	}


	public function removeCart($id)
	{

		//$id = isset($_POST['ArrayofArrays'][0]) ? $_POST['ArrayofArrays'][0] : '';

		if ($id != "") {

			if (Session::has('cart')) {

				$cart = Session::get('cart');
			}

			if (array_key_exists($id, $cart)) {

				unset($cart[$id]);
			}

			Session::put('cart', $cart);
		}

		// echo 'success';
		Session::flash('flash_message', 'Product item removed successfully');
		Session::flash('alert-class', 'alert-success');
        session()->put('added-to-cart', true);
		return back();
	}

	public function shop()
	{
		$page = DB::table('pages')->where('id', 2)->first();

		$shops = DB::table('products')
			->join('categories', 'products.category', '=', 'categories.id')
			->select('products.*', 'categories.name as category_title')
			->get();


		return view('shop.shop', compact('shops', 'page'));
	}

	public function shopDetail($id)
	{

		$product = new Product;
		$product_detail = $product->where('id', $id)->first();
		$att_model = ProductAttribute::groupBy('attribute_id')->where('product_id', $id)->get();
		$att_id = DB::table('product_attributes')->where('product_id', $id)->get();
		$shops = DB::table('products')
			->join('categories', 'products.category', '=', 'categories.id')
			->select('products.*', 'categories.name as category_title')->take(3)->get();


		return view('shop.detail', compact('product_detail', 'shops', 'att_id', 'att_model'));
	}


	public function invoice($id)
	{

		$order_id = $id;
		$order = orders::where('id', $order_id)->first();
		$order_products = orders_products::where('orders_id', $order_id)->get();

		return view('account.invoice')->with('title', 'Invoice #' . $order_id)->with(compact('order', 'order_products'))->with('order_id', $order_id);;
	}

	public function checkout()
	{

		dd(Session::get('cart'));

		if (Session::get('cart') && count(Session::get('cart')) > 0) {
			$countries = DB::table('countries')
				->get();
			return view('checkout', ['cart' => Session::get('cart'), 'countries' => $countries]);
		} else {
			Session::flash('flash_message', 'No Product found');
			Session::flash('alert-class', 'alert-success');
			return redirect('/');
		}
	}


	public function language()
	{
		$languages = $_POST['id'];

		Session::put('language', $languages);

		Session::put('is_select_dropdown', 1);
		// Session::put('language',$languages);
		// $test = Session::get('language');

		// Session::put('test',$test);

		//return redirect('shop-detail/1', ['test'=>$test]);
	}

    public function upsservices(Request $request)
    {
        $tax = 0.00;
        $description = "Domestic Tax"; // Default description

        if ($request->input('country') == 'US') {
            if ($request->input('postal')) {
                $ch = curl_init('https://api.api-ninjas.com/v1/salestax?zip_code=' . $request->input('postal'));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'X-Api-Key: u9uJPdSpJl4pjoQvputyQg==Xp3H6aBKFpo5Zocj',
                ]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $apiResponse = curl_exec($ch);
                if ($apiResponse === false) {
                    return response()->json(['message' => 'Curl error: ' . curl_error($ch), 'status' => false]);
                }
                $apiResponse = json_decode($apiResponse);
            } else {
                $ch = curl_init('https://api.api-ninjas.com/v1/zipcode?city=' . $request->input('city') . '&state=' . $request->input('state'));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'X-Api-Key: u9uJPdSpJl4pjoQvputyQg==Xp3H6aBKFpo5Zocj',
                ]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $apiResponse = curl_exec($ch);
                if ($apiResponse === false) {
                    return response()->json(['message' => 'Curl error: ' . curl_error($ch), 'status' => false]);
                }
                $apiResponse = json_decode($apiResponse);

                $ch = curl_init('https://api.api-ninjas.com/v1/salestax?zip_code=' . $apiResponse[0]->zip_code);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'X-Api-Key: u9uJPdSpJl4pjoQvputyQg==Xp3H6aBKFpo5Zocj',
                ]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $apiResponse = curl_exec($ch);
                if ($apiResponse === false) {
                    return response()->json(['message' => 'Curl error: ' . curl_error($ch), 'status' => false]);
                }
                $apiResponse = json_decode($apiResponse);
            }

            $tax = (float) $apiResponse[0]->total_rate * 100;
        } else {
            $description = "International Custom Tax";
        }

        $weight = 1;
        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            $proweight = Product::find($value['id'])->weight * $value['qty'];
            $weight += $proweight;
        }

        $service = $request->get('shipping_method') ?? '11';

        $clientID = 'TQAtFnYgzZIcGJJGLyXyEMBrDYYV9q30A0duyCVvfrWd4owo';
        $clientSecret = 'VElikvdTAF4AHDPwQno1HG81sOWSMoUYiBFIWfDOAYAw7uPSy3gVYDsdITZaZyqc';

        // Create a Guzzle client
        $client = new Client([
            'base_uri' => 'https://onlinetools.ups.com/',
            'timeout'  => 5.0,
        ]);

        try {
            $response = $client->request('POST', 'security/v1/oauth/token', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'auth' => [
                    $clientID,
                    $clientSecret
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ],
            ]);

            $body = json_decode($response->getBody(), true);
            // return $body;
            $accessToken = $body['access_token'];
        } catch (\Exception $e) {
            // Handle the error accordingly
            return response()->json(['error' => 'Failed to retrieve access token: ' . $e->getMessage()], 500);
        }

        // Use the access token to make an API request to the UPS Rating API
        try {
            $response = $client->request('POST', 'api/rating/v2403/Rate', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer $accessToken",
                ],
                'json' => [
                    "RateRequest" => [
                        "Request" => [
                            "SubVersion" => "1703",
                            "TransactionReference" => ["CustomerContext" => " "],
                        ],
                        "Shipment" => [
                            "ShipmentRatingOptions" => ["UserLevelDiscountIndicator" => "TRUE"],
                            "Shipper" => [
                                "Name" => "Justine Siragusa",
                                "ShipperNumber" => "367009",
                                "Address" => [
                                    "AddressLine" => "4803 95th St N, St. Petersburg",
                                    "City" => "St. Petersburg",
                                    "StateProvinceCode" => "FL",
                                    "PostalCode" => "33708",
                                    "CountryCode" => "US",

                                ],
                            ],
                            "ShipTo" => [
                                "Name" => $request->input('first_name') . ' ' . $request->input('last_name'),
                                "Address" => [
                                    "AddressLine" => $request->input('address'),
                                    "City" => $request->input('city'),
                                    "StateProvinceCode" => $request->input('state'),
                                    "PostalCode" => $request->input('postal'),
                                    "CountryCode" => $request->input('country'),
                                ],
                            ],
                            "ShipFrom" => [
                                "Name" => "Justine Siragusa",
                                "ShipperNumber" => "367009",
                                "Address" => [
                                    "AddressLine" => "4803 95th St N, St. Petersburg",
                                    "City" => "St. Petersburg",
                                    "StateProvinceCode" => "FL",
                                    "PostalCode" => "33708",
                                    "CountryCode" => "US",
                                ],
                            ],
                            "Service" => ["Code" => $service],
                            "ShipmentTotalWeight" => [
                                "UnitOfMeasurement" => [
                                    "Code" => "LBS"
                                ],
                                "Weight" => (intval($weight) < 1) ? "1" : ((string) $weight),
                            ],
                            "Package" => [
                                "PackagingType" => ["Code" => "02", "Description" => "Package"],
                                "Dimensions" => [
                                    "UnitOfMeasurement" => ["Code" => "IN"],
                                    "Length" => "10",
                                    "Width" => "7",
                                    "Height" => "5",
                                ],
                                "PackageWeight" => [
                                    "UnitOfMeasurement" => ["Code" => "LBS"],
                                    "Weight" => number_format((float)$weight, 2, '.', ''),
                                ],
                            ],
                        ],
                    ],
                ]
            ]);


             $apiResponse = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle the error accordingly
            return response()->json(['error' => 'Failed to retrieve rate: ' . $e->getMessage()], 500);
        }

        if (isset($apiResponse['RateResponse']['Response']['ResponseStatus']['Description']) &&
            $apiResponse['RateResponse']['Response']['ResponseStatus']['Description'] === 'Success') {

            // Extract total charges from the response
            $totalCharges = $apiResponse['RateResponse']['RatedShipment']['TotalCharges']['MonetaryValue'];

            // Assuming $tax and $description are defined earlier in your code
            return response()->json([
                'upsamount' => $totalCharges,
                'tax' => $tax,
                'description' => $description,
                'status' => true,
            ]);

        } elseif (isset($apiResponse['RateResponse']['Response']['Alert'][0]['Description'])) {

            // Extract error message from the response alert
            $errorMessage = $apiResponse['RateResponse']['Response']['Alert'][0]['Description'];

            return response()->json([
                'message' => $errorMessage,
                'status' => false,
            ]);

        } else {
            return response()->json([
                'message' => 'Could not verify your address or UPS service unavailable',
                'status' => false,
            ]);
        }

    }

    public function upsapi(Request $request)
    {
        $clientID = 'TQAtFnYgzZIcGJJGLyXyEMBrDYYV9q30A0duyCVvfrWd4owo';
        $clientSecret = 'VElikvdTAF4AHDPwQno1HG81sOWSMoUYiBFIWfDOAYAw7uPSy3gVYDsdITZaZyqc';

        // Create a Guzzle client
        $client = new Client([
            'base_uri' => 'https://onlinetools.ups.com/',
            'timeout'  => 5.0,
        ]);
        // https://onlinetools.ups.com/api/rating/v2403/Rate
        // Get an access token
        try {
            $response = $client->request('POST', 'security/v1/oauth/token', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'auth' => [
                    $clientID,
                    $clientSecret
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ],
            ]);

            $body = json_decode($response->getBody(), true);
            // return $body;
            $accessToken = $body['access_token'];
        } catch (\Exception $e) {
            // Handle the error accordingly
            return response()->json(['error' => 'Failed to retrieve access token: ' . $e->getMessage()], 500);
        }

        // Use the access token to make an API request to the UPS Rating API
        try {
            $response = $client->request('POST', 'api/rating/v2403/Rate', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer $accessToken",
                ],
                'json' => [
                    'RateRequest' => [
                        'Request' => [
                            'RequestOption' => 'Rate',
                            'TransactionReference' => [
                                'CustomerContext' => 'Rating and Service'
                            ]
                        ],
                        'Shipment' => [
                            'Shipper' => [
                                'Name' => 'Shipper Name',
                                'ShipperNumber' => 'ShipperNumber',
                                'Address' => [
                                    'AddressLine' => ['Address Line 1'],
                                    'City' => 'City',
                                    'StateProvinceCode' => 'State',
                                    'PostalCode' => 'Postal Code',
                                    'CountryCode' => 'Country'
                                ]
                            ],
                            'ShipTo' => [
                                'Name' => 'Receiver Name',
                                'Address' => [
                                    'AddressLine' => ['Address Line 1'],
                                    'City' => 'City',
                                    'StateProvinceCode' => 'State',
                                    'PostalCode' => 'Postal Code',
                                    'CountryCode' => 'Country'
                                ]
                            ],
                            'Package' => [
                                'PackagingType' => [
                                    'Code' => '02',
                                    'Description' => 'Rate'
                                ],
                                'PackageWeight' => [
                                    'UnitOfMeasurement' => [
                                        'Code' => 'LBS',
                                        'Description' => 'Pounds'
                                    ],
                                    'Weight' => '10'
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

            $rateResponse = json_decode($response->getBody(), true);
            return $rateResponse;
        } catch (\Exception $e) {
            // Handle the error accordingly
            return response()->json(['error' => 'Failed to retrieve rate: ' . $e->getMessage()], 500);
        }
    }


	public function shipping(Request $request)
	{

		$PostalCode = $request->country; // Zipcode you are shipping To

		define("ENV", "demo"); // demo OR live

		if (ENV == 'demo') {
			$client = new SoapClient("https://staging.postaplus.net/APIService/PostaWebClient.svc?wsdl");
			$Password =  '123456';
			$ShipperAccount =  'DXB51487';
			$UserName =  'DXB51487';
			$CodeStation =  'DXB';
		} else {
			$client = new SoapClient("https://etrack.postaplus.net/APIService/PostaWebClient.svc?singleWsdl");
			$Password =  '';
			$ShipperAccount =  '';
			$UserName =  '';
			$CodeStation =  '';
		}

		$params = array(
			'ShipmentCostCalculation' => array(
				'CI' => array(
					'Password' => $Password,
					'ShipperAccount' => $ShipperAccount,
					'UserName' => $UserName,
					'CodeStation' => $CodeStation,
				),
				"OriginCountryCode" => 'AE',
				"DestinationCountryCode" => $PostalCode,
				"RateSheetType" => 'DOC',
				"Width" => 1,
				"Height" => 1,
				"Length" => 1,
				"ScaleWeight" => 1,
			),
		);


		try {

			$d = $client->__SoapCall("ShipmentCostCalculation", $params);
			$d = json_decode(json_encode($d), true);

			if (isset($d['ShipmentCostCalculationResult']['Message']) and ($d['ShipmentCostCalculationResult']['Message'] == 'SUCCESS')) {
				$status = true;
				$rate = $d['ShipmentCostCalculationResult']['Amount'];
			} else {
				$status = false;
				$messgae = $d['ShipmentCostCalculationResult']['Message'];
			}
		} catch (SoapFault $exception) {
			$status = false;
			$messgae = "Error Found Please try Again";
		}

		//if($status):
		//	echo $rate;
		//else:
		//	echo $messgae;
		//endif;

		//}
		//$cart = Session::get('cart');



		if ($status) {

			$cart = Session::get('cart');
			$cart['shipping'] = $rate;
			//$cart['shipping_address'] = $_POST['shipping_address'];
			Session::put('cart', $cart);

			// return view('shop.cart', ['rate'=> $rate, 'cart'=> $cart]);
			return redirect('/cart');
		} else {
			Session::flash('flash_message', 'Error');
			Session::flash('alert-class', 'alert-success');
			return view('shop.cart', ['messgae' => $messgae]);
		}
		return view('shop.cart', ['messgae' => $messgae, 'cart' => $cart]);
	}

    public function applyDiscount(Request $request)
    {
        session()->forget('discount');
        session()->forget('percentage');

        $validated = $request->validate([
            'discount_code' => 'required',
            'baseprice' => 'required',
        ]);

        $discountCode = $validated['discount_code'];

        // Retrieve the discount from the database
        $discount = Discount::where('code', $discountCode)
                            ->where('expiry_date', '>=', now()) // Check if the discount is still valid
                            ->first();

        if (!$discount) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired discount code.',
            ]);
        }

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);
        if($request->baseprice != 0){
            $baseprice = $request->baseprice - ($request->baseprice * ($discount->percentage / 100));
            session()->put('discount', $baseprice);
            session()->put('percentage', $discount->percentage);
        }

        return response()->json([
            'success' => true,
            'message' => 'Discount applied successfully!',
            'discount' => number_format($baseprice, 2),
            'percentage' => (int)$discount->percentage
        ]);
    }

    public function applyGift(Request $request)
    {
        // session()->forget('gift');
        // session()->forget('balance');

        $validated = $request->validate([
            'gift_code' => 'required',
            'baseprice' => 'required',
        ]);

        $giftCode = $validated['gift_code'];

        // Retrieve the gift from the database
        $giftCard = GiftCard::where('code', $giftCode)
                            ->where('expiry_date', '>=', now()) // Check if the gift is still valid
                            ->first();

        if (!$giftCard) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired gift code.',
            ]);
        }

        if($request->baseprice != 0 && ($request->baseprice >= $giftCard->balance)){
            $baseprice = $request->baseprice;
            $baseprice -= $giftCard->balance;
            // session()->put('gift', $baseprice);
            // session()->put('balance', $gift->balance);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'You does not apply on this product.',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Gift applied successfully!',
            'gift' => number_format($baseprice, 2),
            'balance' => (int)$giftCard->balance
        ]);
    }
}
