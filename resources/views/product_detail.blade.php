@extends('layouts.main')

@section('css')
    <style>
        .inner-drop {
            padding-left: 1rem;
            display: none;
            text-transform: uppercase;
        }

        .inner-drop-2 {
            padding-left: 1rem;
            display: none;
        }

        .category ul li a {
            text-transform: uppercase;
        }

        .cart-btn a.btn.btn-custom {
            color: #c0c0c0;
            border: 1px solid #c0c0c0;
            border-radius: 0;
            width: 100% !important;
            padding: 12px 0px;
            margin-top: 16px;
        }

        .inner-product-details select {
            background-color: transparent;
            width: 100% !important;
            color: #c0c0c0;
            border-radius: unset;
            height: 50px !important;
        }

        .inner-product-details button {
            background-color: transparent;
            width: 100% !important;
            color: #c0c0c0;
            border-radius: unset;
            height: 50px !important;
            border: 1px solid #c0c0c0;
        }


        table {

            color: #fff;

        }

        tbody,
        th,
        td {
            border: 1px solid #fff;
            padding: 5px;
        }

        p {
            color: #fff;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
            color: #fff !important;
        }

        h2 {
            display: none;
        }

        h3 strong {
            color: #fff !important;
        }

        .activeee {
            background: #000;
            color: #fff;
            border: 1px solid #fff;

        }


        .activee {

            background: #000;
            color: #fff;
            border: 1px solid #fff;

        }

        <style>

        /* Bundle item overlay for slider */
        .bundle-item-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .swiper-slide:hover .bundle-item-overlay {
            opacity: 1;
        }

        .bundle-item-info h6 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .bundle-item-info p {
            margin: 2px 0;
            font-size: 12px;
        }

        /* Bundle thumbnail badge */
        .bundle-thumbnail {
            position: relative;
        }

        .bundle-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #ff4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Bundle components section */
        .bundle-components-section {
            background: transparent;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 2px solid white;
        }

        .bundle-components-section h4 {
            color: white;
        }

        .bundle-component-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
            padding: 10px;
        }

        .bundle-component-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .component-image {
            position: relative;
        }

        .quantity-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .component-info {
            padding: 15px;
        }

        .component-info h6 {
            margin-bottom: 5px;
            font-size: 14px;
            color: white;
        }

        .component-price {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .component-sku {
            color: #6c757d;
            font-size: 12px;
            margin: 0;
        }

        /* Bundle details table */
        .bundle-details table {
            font-size: 14px;
        }

        .bundle-details .table-success {
            background-color: #d4edda;
        }

        .bundle-details .table-primary {
            background-color: #cce5ff;
        }

        .bundle-details .table-warning {
            background-color: #fff3cd;
        }

        .bundle-details h5 {
            color: white;
        }

        .bundle-details tr {
            color: white;
        }

        .bundle-details th {
            color: white;
        }

        .bundle-details td {
            color: white;
        }

        .component-image img {
            color: white;
        }

        h3.mob-view {
            color: white;
            margin: 25px 0;
            display: none;
        }

        a.minus-11 {
            display: flex;
            width: 100%;
            height: 25px;
            font-size: 40px;
            align-items: center;
            text-decoration: none;
            color: #c0c0c0;
        }

        a.plus-11 {
            display: flex;
            width: 100%;
            height: 25px;
            font-size: 35px;
            align-items: center;
            text-decoration: none;
            justify-content: center;
            color: #c0c0c0;
        }

        a.minus-11 span {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            font-weight: 600;
        }

        a.plus-11 span {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            font-weight: 600;
        }

        @media(max-width:991px) {
            .category {
                display: none;
            }

            h3.main-mob-view {
                display: none;
            }

            h3.mob-view {
                display: block;
            }
        }
    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->

    <!-- <section class="heading-sec">
                                                                                                                                                                                                                                                        <div class="container">
                                                                                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                                                                                <div class="col-lg-12">
                                                                                                                                                                                                                                                                    <div class="inner-headings">
                                                                                                                                                                                                                                                                        <h2>PRODUCTS</h2>
                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                    </section> -->



    <section class="inner-product-sec">
        <div class="container">
            <div class="row">


                <?php
                
                use App\Product;
                
                $get_category = DB::table('categories')->get();
                $route_category = Request::segment(3);
                $route_subcategory = Request::segment(4);
                $route_child_subcategory = Request::segment(5);
                
                ?>

                <div class="col-md-3">

                    <div class="category">
                        <h4>Category</h4>
                        <ul>

                            @foreach ($get_category as $key1 => $val_category)
                                @if ($val_category->id != 2)
                                    {{-- Category ID 2 ko hide karna --}}
                                    <li class="inner-shop">
                                        <a href="{{ URL('product/' . $val_category->id) }}" style="<?php if ($route_category == $val_category->id) {
                                            echo 'color:red';
                                        } ?>">
                                            {{ $val_category->name }}
                                        </a>

                                        <?php $get_subcategory = DB::table('subcategories')->where('category', $val_category->id)->get(); ?>

                                        @foreach ($get_subcategory as $key2 => $val_subcategory)
                                            <div class="inner-drop" style="<?php if ($route_category == $val_subcategory->category) {
                                                echo 'display:block;';
                                            } ?>">
                                                <ul>
                                                    <li class="inner-shop-2">
                                                        <a href="{{ URL('product/' . $val_category->id . '/' . $val_subcategory->id) }}"
                                                            style="<?php if ($route_subcategory == $val_subcategory->id) {
                                                                echo 'color:red';
                                                            } ?>">
                                                            {{ $val_subcategory->subcategory }}
                                                        </a>

                                                        <?php $get_childsubcategory = DB::table('childsubcategories')->where('subcategory', $val_subcategory->id)->get(); ?>

                                                        @foreach ($get_childsubcategory as $key2 => $val_childsubcategory)
                                                            <div class="inner-drop-2" style="<?php if ($route_subcategory == $val_childsubcategory->subcategory) {
                                                                echo 'display:block;';
                                                            } ?>">
                                                                <ul>
                                                                    <li>
                                                                        <a href="{{ URL('product/' . $val_category->id . '/' . $val_subcategory->id . '/' . $val_childsubcategory->id) }}"
                                                                            style="<?php if ($route_child_subcategory == $val_childsubcategory->id) {
                                                                                echo 'color:red';
                                                                            } ?>">
                                                                            {{ $val_childsubcategory->childsubcategory }}
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </li>
                                @endif
                            @endforeach


                        </ul>
                    </div>

                </div>

                <?php $get_multiple_images = DB::table('product_imagess')->where('product_id', $get_product_detail->id)->get(); ?>

                <div class="col-lg-5">
                    <div class="inner-img">
                        <h3 style="font-family: PEPSI_pl;" class="mob-view"> {{ $get_product_detail->product_title }} </h3>
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                {{-- Bundle ki main image --}}
                                <div class="swiper-slide">
                                    <img src="{{ asset($get_product_detail->image) }}" style="height: 430px;" />
                                </div>

                                {{-- Gallery images --}}
                                @foreach ($get_multiple_images as $key => $val_images)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($val_images->image) }}" style="height: 430px;" />
                                    </div>
                                @endforeach

                                {{-- BUNDLE ITEMS KI IMAGES - Agar product bundle hai to --}}
                                @if ($get_product_detail->type == 'bundle')
                                    @php
                                        // Bundle items with their product details
                                        $bundleItems = DB::table('bundle_items')
                                            ->join('products', 'bundle_items.product_id', '=', 'products.id')
                                            ->where('bundle_items.bundle_id', $get_product_detail->id)
                                            ->select('products.*', 'bundle_items.quantity')
                                            ->get();
                                    @endphp

                                    @foreach ($bundleItems as $bundleItem)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($bundleItem->image) }}" style="height: 430px;" />
                                            <div class="bundle-item-overlay">
                                                <div class="bundle-item-info">
                                                    <h6>{{ $bundleItem->product_title }}</h6>
                                                    <p>Quantity: {{ $bundleItem->quantity }}</p>
                                                    <p class="price">₹{{ number_format($bundleItem->price, 2) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                {{-- Thumbnail for main image --}}
                                <div class="swiper-slide">
                                    <img src="{{ asset($get_product_detail->image) }}" style="height: 100px;" />
                                </div>

                                {{-- Thumbnails for gallery images --}}
                                @foreach ($get_multiple_images as $key => $val_images)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($val_images->image) }}" style="height: 100px;" />
                                    </div>
                                @endforeach

                                {{-- BUNDLE ITEMS KI THUMBNAILS --}}
                                @if ($get_product_detail->type == 'bundle')
                                    @foreach ($bundleItems as $bundleItem)
                                        <div class="swiper-slide bundle-thumbnail">
                                            <img src="{{ asset($bundleItem->image) }}" style="height: 100px;" />
                                            <div class="bundle-badge">x{{ $bundleItem->quantity }}</div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <hr style="border:1px solid #5f5f5f;">



                    <div class="col-lg-12">
                        <div class="inner-producttt">
                            <div class="productmain">
                                <button class="clicktabs activee" onclick="opencity(event , 'porduct1')" id="showonly">
                                    Description
                                </button>
                                <button class="clicktabs" onclick="opencity(event , 'porduct2')">
                                    Additional Information
                                </button>

                                {{-- BUNDLE KE LIYE EXTRA TAB --}}
                                @if ($get_product_detail->type == 'bundle')
                                    <button class="clicktabs" onclick="opencity(event , 'porduct3')">
                                        Bundle Details
                                    </button>
                                @endif
                            </div>

                            <br>

                            <div class="contentinfo">
                                <div class="cycleinfo" id="porduct1">
                                    {!! $get_product_detail->description !!}
                                </div>

                                <div class="cycleinfo" id="porduct2" style="display:none;">
                                    {!! $get_product_detail->additional_information !!}
                                </div>

                                {{-- BUNDLE DETAILS TAB --}}
                                @if ($get_product_detail->type == 'bundle')
                                    <div class="cycleinfo" id="porduct3" style="display:none;">
                                        <div class="bundle-details">
                                            <h5>Bundle Composition</h5>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Individual Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $bundleTotal = 0;
                                                    @endphp
                                                    @foreach ($bundleItems as $bundleItem)
                                                        @php
                                                            $itemTotal = $bundleItem->price * $bundleItem->quantity;
                                                            $bundleTotal += $itemTotal;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $bundleItem->product_title }}</td>
                                                            <td>{{ $bundleItem->quantity }}</td>
                                                            <td>₹{{ number_format($bundleItem->price, 2) }}</td>
                                                            <td>₹{{ number_format($itemTotal, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3" class="text-end"><strong>Individual
                                                                Total:</strong></td>
                                                        <td><strong>₹{{ number_format($bundleTotal, 2) }}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end"><strong>Bundle Price (You
                                                                Save):</strong></td>
                                                        <td><strong>₹{{ number_format($get_product_detail->price, 2) }}</strong>
                                                        </td>
                                                    </tr>
                                                    @if ($bundleTotal > $get_product_detail->price)
                                                        <tr>
                                                            @php
                                                                $savings = $bundleTotal - $get_product_detail->price;
                                                                $savingsPercentage = ($savings / $bundleTotal) * 100;
                                                            @endphp
                                                            <td colspan="3" class="text-end"><strong>Total
                                                                    Savings:</strong></td>
                                                            <td><strong>₹{{ number_format($savings, 2) }}
                                                                    ({{ number_format($savingsPercentage, 1) }}%)</strong>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                $custom_ordering_products_map = [
                    116 => [50, 51, 52, 53, 55, 56, 25, 26],
                    126 => [50, 51, 52, 53, 55, 56, 25, 26],
                    146 => [50, 26],
                    148 => [50, 24, 55, 27, 25, 26],
                    151 => [50, 7, 26],
                    153 => [50, 58, 55, 27, 25, 26],
                    155 => [50, 51, 55, 27, 25, 26],
                    157 => [66, 5, 27, 25, 26],
                    165 => [50, 67, 53, 27],
                    167 => [50, 67, 52, 27],
                    5 => [9, 10],
                    201 => [21, 14],
                    236 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    246 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    262 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    313 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    315 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    318 => [50, 67, 77, 52, 53, 78, 79, 55, 56, 25, 26, 74, 75],
                    321 => [50, 79, 7, 25, 26, 74, 75],
                    322 => [36, 51, 79, 37, 27, 25, 38, 74, 75],
                    326 => [24, 79, 25, 26, 27, 28, 74, 75],
                    333 => [24, 77, 27, 28, 74, 75],
                    340 => [50, 67, 77, 52, 53, 74, 75],
                    373 => [14, 9, 97],
                    388 => [14, 9, 97],
                    388 => [97, 80],
                    260 => [14, 11],
                    270 => [87, 86],
                    418 => [9, 14],
                    428 => [14, 9],
                    265 => [14, 9],
                    293 => [14, 58, 44, 27],
                    295 => [14, 58, 44, 27],
                    295 => [14, 58, 44, 27, 60],
                    143 => [14, 58, 60, 44],
                    143 => [14, 58, 44, 27, 61, 26],
                    133 => [14, 58, 44, 27],
                    135 => [14, 58, 44, 27, 25, 26],
                    131 => [14, 57, 27, 25, 38],
                    460 => [83, 5],
                ];
                
                $custom_ordering_products_array = null;
                if (array_key_exists($get_product_detail->id, $custom_ordering_products_map)) {
                    $custom_ordering_products_array = $custom_ordering_products_map[$get_product_detail->id];
                }
                
                if ($get_product_detail->id == 455) {
                    $productAttributes_id = DB::table('product_attributes')->select('product_id', 'attribute_id')->where('product_id', $get_product_detail->id)->groupBy('attribute_id')->orderBy('attribute_id', 'desc')->get();
                } else {
                    $productAttributes_id = DB::table('product_attributes')
                        ->select('product_id', 'attribute_id')
                        ->where('product_id', $get_product_detail->id)
                        ->groupBy('attribute_id')
                        ->when(!is_null($custom_ordering_products_array), function ($q) use ($custom_ordering_products_array) {
                            return $q->orderByRaw('FIELD(attribute_id, ' . implode(',', $custom_ordering_products_array) . ')');
                        })
                        ->get();
                }
                ?>



                <div class="col-lg-4">

                    @if ($get_product_detail->type == 'bundle')
                        <div class="col-lg-12">
                            <div class="bundle-components-section">
                                <h4>This Bundle Includes:</h4>
                                <div class="row">
                                    @foreach ($bundleItems as $bundleItem)
                                        <div class="col-md-12 col-sm-12 mb-3">
                                            <div class="bundle-component-card">
                                                <div class="component-image">
                                                    <img src="{{ asset($bundleItem->image) }}"
                                                        alt="{{ $bundleItem->product_title }}"
                                                        style="height: 150px; width: 100%; object-fit: cover;">
                                                    <span class="quantity-badge">Qty: {{ $bundleItem->quantity }}</span>
                                                </div>
                                                <div class="component-info">
                                                    <h6>{{ $bundleItem->product_title }}</h6>
                                                    <p class="component-price">₹{{ number_format($bundleItem->price, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <hr style="border:1px solid #5f5f5f;">
                    @endif
                    <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $get_product_detail->id }}">

                        <div class="inner-product-details">
                            <!-- <h4>TECHDEV-PROFILERACING</h4> -->
                            <h3 style="font-family: PEPSI_pl;" class="main-mob-view">
                                {{ $get_product_detail->product_title }}
                            </h3>
                            @php
                                $minPrice = $get_product_detail->price;
                                $maxPrice = $get_product_detail->maximum_price;

                            @endphp
                            @if ($get_product_detail->id === 332)
                                <?php $product = Product::find(335); ?>

                                <h3 id="h3_original">${{ $get_product_detail->price_with_increment }}
                                    <?php if ($get_product_detail->maximum_price_with_increment != '' && $get_product_detail->maximum_price_with_increment != '0') {
                                        echo ' - $' . $get_product_detail->maximum_price_with_increment;
                                    } ?>
                                </h3>
                            @elseif($get_product_detail)
                                <h3 id="h3_original">${{ $get_product_detail->price_with_increment }}
                                    <?php if ($get_product_detail->maximum_price_with_increment != '' && $get_product_detail->maximum_price_with_increment != '0') {
                                        echo ' - $' . $get_product_detail->maximum_price_with_increment;
                                    } ?>
                                </h3>
                            @else
                                <h3 id="originproductprice">${{ $minPrice }} <?php if ($maxPrice != '' && $maxPrice != '0') {
                                    echo ' - $' . $maxPrice;
                                } ?></h3>
                            @endif
                            <h3 id="h3_additional" hidden>${{ $get_product_detail->price_with_increment }}
                                <?php if ($get_product_detail->maximum_price_with_increment != '' && $get_product_detail->maximum_price_with_increment != '0') {
                                    echo ' - $' . $get_product_detail->maximum_price_with_increment;
                                } ?>
                            </h3>
                            <input type="hidden" name="exist_price" id="exist_price" value=0>


                            @foreach ($productAttributes_id as $key => $val_product_attribute)
                                <h6> {{ App\Attributes::find($val_product_attribute->attribute_id)->name }} </h6>

                                <?php $get_attribute_values = DB::table('product_attributes')->where('attribute_id', $val_product_attribute->attribute_id)->where('product_id', $val_product_attribute->product_id)->get(); ?>

                                <input type="hidden" name="select_price"
                                    class="select_price{{ App\Attributes::find($val_product_attribute->attribute_id)->id }}"
                                    value=0>
                                <input type="hidden" name="variation[{{ $val_product_attribute->attribute_id }}][qty]"
                                    value="{{ $get_product_detail->qty ?? 1 }}">
                                <select
                                    class="form-control select_option{{ App\Attributes::find($val_product_attribute->attribute_id)->id }} get_option"
                                    name="variation[{{ App\Attributes::find($val_product_attribute->attribute_id)->name }}]">

                                    <option value="">Choose an option</option>
                                    @foreach ($get_attribute_values as $key => $val_attr_value)
                                        <option data-price="{{ $val_attr_value->price }}"
                                            data-attribute-value-id="{{ $val_attr_value->id }}"
                                            data-qty="{{ $val_attr_value->qty ?? 0 }}"
                                            value="{{ $val_attr_value->value }}">
                                            {{ App\AttributeValue::find($val_attr_value->value)->value }}
                                        </option>
                                    @endforeach

                                </select>



                                @if ($get_product_detail->id === 332)
                                    <div class="bundled_product bundled_product_summary product bundled_item_optional">
                                        <div class="bundled_product_images images" style="opacity: 1;">
                                            <figure class="bundled_product_image woocommerce-product-gallery__image"><a
                                                    href="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677.jpg"
                                                    class="image zoom" title="Elite Freewheel Tool Gallery Photo copy(1)"
                                                    data-rel="photoSwipe"><img width="100" height="100"
                                                        style="margin-top: 15px;"
                                                        src="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-300x300.jpg"
                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                        alt="" title="Elite Freewheel Tool Gallery Photo copy(1)"
                                                        data-caption=""
                                                        data-large_image="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677.jpg"
                                                        data-large_image_width="487" data-large_image_height="380"
                                                        decoding="async" loading="lazy"
                                                        srcset="https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-300x300.jpg 300w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-100x100.jpg 100w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-150x150.jpg 150w, https://www.profileracing.com/wp-content/uploads/2016/05/Elite-Freewheel-Tool-Gallery-Photo-copy1-e1656431648677-45x45.jpg 45w"
                                                        sizes="auto, (max-width: 300px) 100vw, 300px"></a></figure>
                                        </div>
                                        <div class="details">
                                            <h4 class="bundled_product_title product_title"><span
                                                    class="bundled_product_title_inner"><span class="item_title">ELITE
                                                        FREEWHEEL TOOL</span><span class="item_qty"></span><span
                                                        class="item_suffix"></span></span> <span
                                                    class="bundled_product_title_link"><a
                                                        class="bundled_product_permalink"
                                                        href="https://www.profileracing.com/product/elite-freewheel-tool/"
                                                        target="_blank" aria-label="View product"></a></span></h4>
                                            <label class="bundled_product_optional_checkbox">

                                                <input class="bundled_product_checkbox" type="checkbox"
                                                    id="add_price_checkbox" name="bundle_selected_optional_1"
                                                    value="{{ $product->price }}">
                                                <span class="price"><span
                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                class="woocommerce-Price-currencySymbol"
                                                                style="color: #fff;">Add
                                                                For $
                                                                {{ $product->price }}</span></bdi></span></span></label>
                                            <div class="cart" data-title="ELITE FREEWHEEL TOOL"
                                                data-product_title="ELITE FREEWHEEL TOOL" data-visible="yes"
                                                data-optional_suffix="" data-optional="yes" data-type="simple"
                                                data-bundled_item_id="1" data-custom_data="[]" data-product_id="62592"
                                                data-bundle_id="8693">
                                                <div class="bundled_item_wrap">
                                                    <div class="bundled_item_cart_content" style="">
                                                        <div class="bundled_item_cart_details"></div>
                                                        <div class="bundled_item_after_cart_details bundled_item_button">
                                                            <input class="bundled_qty" type="hidden"
                                                                name="bundle_quantity_1" value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--
                                    <script>
                                        document.getElementById('add_price_checkbox').addEventListener('change', function () {
                                            let priceElement = document.getElementById('h3_original');
                                            let basePrice = parseFloat("{{ $get_product_detail->price_with_increment }}"); // Laravel se price lena
                                            let additionalPrice = parseFloat(this.value);

                                            if (this.checked) {
                                                priceElement.innerText = `$${(basePrice + additionalPrice).toFixed(2)}`;
                                            } else {
                                                priceElement.innerText = `$${basePrice.toFixed(2)}`;
                                            }
                                        });
                                    </script> --}}
                                @endif

                                <h3 class="span_selected_option_price text-white"></h3>
                            @endforeach


                            <h6>Quantity</h6>
                            <div class="quantity">
                                <a href="#" class=" minus-11"><span>-</span></a>
                                <input name="qty" id="qty" type="text" class="quantity__input input-1"
                                    readonly="" value="1">
                                <a href="#" class=" plus-11"><span>+</span></a>
                            </div>

                            <br>

                            <div class="cart-btn">
                                <button type="submit" class="btn btn-custom" id="addCart"
                                    style="background: red; color: white; font-weight: bold; font-size: 23px;">
                                    Add to cart
                                    <!-- <a href="#" class="btn btn-custom white">Buy it now</a> -->
                            </div>

                        </div>

                    </form>

                </div>








            </div>



        </div>
    </section>
@endsection

@section('js')
    <script>
        let temp_id;
        let temp_price_id;
        var temp_price = 0;
        var select_price = 0;
        var f_select_price;
        var totalPrice = parseFloat('{{ $get_product_detail->price_with_increment }}').toFixed(2);
    </script>

    <!-- <script>
        let productId = {!! $get_product_detail->id !!};

        if (productId === 332) {
            document.addEventListener("DOMContentLoaded", function() {
                let checkbox = document.getElementById('add_price_checkbox');
                let priceElement = document.getElementById('h3_original');
                let basePrice = parseFloat("{{ $get_product_detail->price_with_increment }}");

                if (checkbox) {
                    checkbox.addEventListener('change', function() {
                        let selectvalue = document.getElementsByClassName('get_option').value ?? 0;

                        let additionalPrice = parseFloat(selectvalue) || 0;

                        if (this.checked) {
                            console.log(`$${(basePrice + additionalPrice + 19.99).toFixed(2)}`);

                            priceElement.innerText = `$${(basePrice + additionalPrice + 19.99).toFixed(2)}`;
                        } else {
                            priceElement.innerText = `$${basePrice.toFixed(2)}`;
                        }
                    });
                }
            });
        } else {

            function updateOptionPrice(selector) {
                var text = selector.attr('class');
                var regex = /\d+/;
                var number = text.match(regex)[0];

                var selectedOption = selector.find('option:selected');
                var optionPrice = selectedOption.data('price');
                var optionQty = selectedOption.data('qty');
                var attributeValueId = selectedOption.data('attribute-value-id');
                var addToCartBtn = $('#addCart');

                if (selectedOption.index() === 0) {
                    selector.next('.span_selected_option_price').html('').hide();
                    addToCartBtn.prop('disabled', false) // default enable
                        .css({
                            'opacity': '1',
                            'cursor': 'pointer'
                        });
                    return;
                }

                if (optionPrice !== undefined) {
                    var amount = parseFloat(optionPrice).toFixed(2);

                    let displayText = '$' + amount;

                    if (optionQty !== undefined) {
                        if (parseInt(optionQty) > 0) {
                            // displayText += ' — Available: ' + optionQty + ' item' + (optionQty > 1 ? 's' : '');
                            displayText = displayText;


                            addToCartBtn.prop('disabled', false)
                                .css({
                                    'opacity': '1',
                                    'cursor': 'pointer',
                                    'background': 'red'
                                });
                        } else {
                            displayText += ' — <span style="color:#ff4444;">Out of stock</span>';

                            // ❌ Disable Add to Cart
                            addToCartBtn.prop('disabled', true)
                                .css({
                                    'opacity': '0.5',
                                    'cursor': 'not-allowed',
                                    'background': '#888'
                                });
                        }
                    }

                    selector.next('.span_selected_option_price').html(displayText).show();

                    $('.select_price' + number).val(amount);

                    var totalPrice = parseFloat('{{ $get_product_detail->price_with_increment }}').toFixed(2);
                    $('.select_price' + number).each(function() {
                        totalPrice = (parseFloat(totalPrice) + parseFloat($(this).val())).toFixed(2);
                    });

                    $('#h3_original').prop('hidden', false);
                    $('#h3_additional').prop('hidden', false);
                } else {
                    selector.next('.span_selected_option_price').html('$0.00').show();
                }
            }


        }


        @foreach ($productAttributes_id as $key => $val_product_attribute)
            var dropdown = $('.select_option{{ App\Attributes::find($val_product_attribute->attribute_id)->id }}');

            // Initialize on page load
            updateOptionPrice(dropdown);

            // Add event listener for changes
            dropdown.on('change', function() {
                updateOptionPrice($(this));
            });
        @endforeach
    </script> -->


    <script>
        let productId = {!! $get_product_detail->id !!};

        if (productId === 332) {
            document.addEventListener("DOMContentLoaded", function() {
                let checkbox = document.getElementById('add_price_checkbox');
                let priceElement = document.getElementById('h3_original');
                let basePrice = parseFloat("{{ $get_product_detail->price_with_increment }}");

                if (checkbox) {
                    checkbox.addEventListener('change', function() {
                        let selectvalue = document.getElementsByClassName('get_option').value ?? 0;
                        let additionalPrice = parseFloat(selectvalue) || 0;

                        if (this.checked) {
                            console.log(`$${(basePrice + additionalPrice + 19.99).toFixed(2)}`);
                            priceElement.innerText = `$${(basePrice + additionalPrice + 19.99).toFixed(2)}`;
                        } else {
                            priceElement.innerText = `$${basePrice.toFixed(2)}`;
                        }
                    });
                }
            });
        } else {
            function updateOptionPrice(selector) {
                var text = selector.attr('class');
                var regex = /\d+/;
                var number = text.match(regex)[0];

                var selectedOption = selector.find('option:selected');
                var optionPrice = selectedOption.data('price');
                var optionQty = selectedOption.data('qty');
                var attributeValueId = selectedOption.data('attribute-value-id');
                var addToCartBtn = $('#addCart');

                if (selectedOption.index() === 0) {
                    selector.next('.span_selected_option_price').html('').hide();
                    addToCartBtn.prop('disabled', false)
                        .css({
                            'opacity': '1',
                            'cursor': 'pointer'
                        });
                    return;
                }

                if (optionPrice !== undefined) {
                    var amount = parseFloat(optionPrice).toFixed(2);
                    let displayText = '$' + amount;

                    if (optionQty !== undefined) {
                        // Get current quantity from input
                        var currentQty = parseInt($('input[name="qty"]').val()) || 1;

                        if (parseInt(optionQty) > 0) {
                            displayText = displayText;

                            // ✅ Get attribute name for better alert message
                            var attributeName = selector.prev('h6').text().trim() || 'Selected option';
                            var optionName = selectedOption.text().trim();

                            // ✅ Check if selected quantity exceeds available stock
                            if (currentQty > parseInt(optionQty)) {
                                alert('❌ Only ' + optionQty + ' items available for ' + attributeName + ' - ' + optionName +
                                    '! Please reduce quantity.');

                                // Reset to maximum available quantity
                                $('input[name="qty"]').val(optionQty);

                                addToCartBtn.prop('disabled', false)
                                    .css({
                                        'opacity': '1',
                                        'cursor': 'pointer',
                                        'background': 'red'
                                    });
                            } else {
                                addToCartBtn.prop('disabled', false)
                                    .css({
                                        'opacity': '1',
                                        'cursor': 'pointer',
                                        'background': 'red'
                                    });
                            }
                        } else {
                            displayText += ' — <span style="color:#ff4444;">Out of stock</span>';
                            addToCartBtn.prop('disabled', true)
                                .css({
                                    'opacity': '0.5',
                                    'cursor': 'not-allowed',
                                    'background': '#888'
                                });
                        }
                    }

                    selector.next('.span_selected_option_price').html(displayText).show();
                    $('.select_price' + number).val(amount);

                    var totalPrice = parseFloat('{{ $get_product_detail->price_with_increment }}').toFixed(2);
                    $('.select_price' + number).each(function() {
                        totalPrice = (parseFloat(totalPrice) + parseFloat($(this).val())).toFixed(2);
                    });

                    $('#h3_original').prop('hidden', false);
                    $('#h3_additional').prop('hidden', false);
                } else {
                    selector.next('.span_selected_option_price').html('$0.00').show();
                }
            }

            $(document).ready(function() {
                // Plus button
                $('.plus-11').on('click', function(e) {
                    e.preventDefault();
                    var qtyInput = $('input[name="qty"]');
                    var currentQty = parseInt(qtyInput.val()) || 1;
                    var newQty = currentQty + 1;

                    // ✅ FIX: Pehle check karo, phir increase karo
                    if (canIncreaseQuantity(newQty)) {
                        qtyInput.val(newQty);
                    }
                    // Agar false return kare, toh kuch nahi karo - quantity same rahegi
                });

                // Minus button
                $('.minus-11').on('click', function(e) {
                    e.preventDefault();
                    var qtyInput = $('input[name="qty"]');
                    var currentQty = parseInt(qtyInput.val()) || 1;
                    if (currentQty > 1) {
                        qtyInput.val(currentQty - 1);
                    }
                });
            });

            function canIncreaseQuantity(newQty) {
                var canIncrease = true;
                var maxAvailable = null;
                var limitingAttribute = '';

                $('select[class*="select_option"]').each(function() {
                    var selectedOption = $(this).find('option:selected');
                    var optionQty = selectedOption.data('qty');
                    var attributeName = $(this).prev('h6').text().trim() || 'Option';
                    var optionName = selectedOption.text().trim();

                    if (optionQty !== undefined && parseInt(optionQty) > 0) {
                        // Find the limiting attribute (lowest stock)
                        if (maxAvailable === null || parseInt(optionQty) < maxAvailable) {
                            maxAvailable = parseInt(optionQty);
                            limitingAttribute = attributeName + ' - ' + optionName;
                        }

                        // ✅ FIX: Directly check and return false
                        if (newQty > parseInt(optionQty)) {
                            canIncrease = false;
                            // ✅ Break the loop immediately
                            return false;
                        }
                    }
                });

                // ✅ FIX: Agar increase nahi kar sakte, toh alert show karo aur false return karo
                if (!canIncrease && maxAvailable !== null) {
                    alert('❌ Only ' + maxAvailable + ' items available for ' + limitingAttribute +
                        '! You cannot add more than ' + maxAvailable + ' items.');
                    return false;
                }

                return canIncrease;
            }

            // ✅ FIX: Ye function bhi update karo
            function checkStockForAllOptions() {
                var selectedQty = parseInt($('input[name="qty"]').val()) || 1;
                // Bas check karo, koi automatic setting nahi
                canIncreaseQuantity(selectedQty);
            }
        }

        @foreach ($productAttributes_id as $key => $val_product_attribute)
            var dropdown = $('.select_option{{ App\Attributes::find($val_product_attribute->attribute_id)->id }}');

            // Initialize on page load
            updateOptionPrice(dropdown);

            // Add event listener for changes
            dropdown.on('change', function() {
                updateOptionPrice($(this));
                checkStockForAllOptions();
            });
        @endforeach
    </script>

    <script type="text/javascript">
        var t_price = parseFloat('{{ $get_product_detail->price_with_increment }}').toFixed(2);
        // var temp_p = 0;
        // $('.get_option').on('change', function () {
        //     temp_p = 0;
        //     $('.span_selected_option_price').each(function() {
        //         if($(this).text() != ''){
        //             var stringWithoutDollarSign = $(this).text().replace("$", "");
        //             temp_p += parseFloat(stringWithoutDollarSign);
        //         }else if($(this).text() == ''){
        //             var stringWithoutDollarSign = 0;
        //             temp_p += parseFloat(stringWithoutDollarSign);
        //         }
        //     });
        //     t_price = parseFloat('{{ $get_product_detail->price_with_increment }}') + temp_p; // Update t_price
        //     $('#exist_price').val(t_price);
        //     $('#h3_additional').html('$' + t_price.toFixed(2));
        // });
        function updateTotalPrice() {
            var temp_p = 0;

            // Iterate through each span and calculate the total additional price
            $('.span_selected_option_price').each(function() {
                if ($(this).text() != '') {
                    // var stringWithoutDollarSign = $(this).text().replace("$", "");
                    var stringWithoutDollarSign = $(this).text()
                        .replace(/\$/g, '')
                        .replace(/,/g, '')
                        .replace(/\s/g, '');
                    temp_p += parseFloat(stringWithoutDollarSign);
                } else if ($(this).text() == '') {
                    temp_p += 0; // Default to 0 if the text is empty
                }
            });

            // Update total price
            // var t_price = parseFloat('{{ $get_product_detail->price_with_increment }}') + temp_p;
            var base = '{{ $get_product_detail->price_with_increment }}'.replace(/,/g, '').replace(/\s/g, '');
            var t_price = parseFloat(base) + temp_p;
            $('#exist_price').val(t_price);
            $('#h3_additional').html('$' + t_price.toFixed(2));
        }

        updateTotalPrice();

        $('.get_option').on('change', function() {
            updateTotalPrice();
        });

        $(document).ready(function() {
            $(".inner-shop").click(function() {
                $(".inner-drop").show()
            })
        });

        $(document).ready(function() {
            $(".inner-shop-2").click(function() {
                $(".inner-drop-2").show()
            })
        });

        // $('.select_option').on('change', function () {
        //     let option_label = $(this).find('option:selected').text();
        //     if (option_label.includes('+$')) {
        //         let amount = parseFloat(option_label.split('+$')[1]);
        //         let price = parseFloat({{ $get_product_detail->price_with_increment }});
        //         let additional_price = (amount + price).toFixed(2);
        //         $(this).next('.span_selected_option_price').html('$' + amount.toFixed(2));
        //         $('#h3_original').prop('hidden', true);
        //         $('#h3_additional').prop('hidden', false);
        //         $('#h3_additional').html('$' + additional_price);
        //     } else {
        //         $(this).next('.span_selected_option_price').html('');
        //         $('#h3_original').prop('hidden', false);
        //         $('#h3_additional').prop('hidden', true);
        //     }
        // });



        function opencity(evt, cityName) {

            var a, cycleinfo, clicktabs;

            cycleinfo = document.getElementsByClassName("cycleinfo");

            for (i = 0; i < cycleinfo.length; i++) {
                cycleinfo[i].style.display = "none";
            }
            clicktabs = document.getElementsByClassName("clicktabs");
            for (i = 0; i < clicktabs.length; i++) {
                clicktabs[i].className = clicktabs[i].className.replace("activee", " ")
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " activee"
        }
    </script>
    <script>
        document.getElementById('add-cart').addEventListener('submit', function(e) {

            let selects = document.querySelectorAll('.get_option');
            let allValid = true;

            selects.forEach(function(select) {

                // Remove old message
                let errorMsg = select.parentNode.querySelector('.error-text');
                if (errorMsg) errorMsg.remove();

                // Reset border
                select.style.border = "1px solid #555";

                if (select.value === "") {
                    e.preventDefault();
                    allValid = false;

                    // Red border highlight
                    select.style.border = "2px solid red";

                    // Create error message
                    let msg = document.createElement('small');
                    msg.classList.add('error-text');
                    msg.style.color = "red";
                    msg.style.display = "block";
                    msg.style.marginTop = "5px";
                    msg.innerText = "Fill this input (required)";

                    // Add message directly under SELECT
                    select.parentNode.appendChild(msg);
                }
            });

            if (!allValid) return false;
        });
    </script>
@endsection
