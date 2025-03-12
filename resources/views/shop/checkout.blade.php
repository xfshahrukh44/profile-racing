@extends('layouts.main')
@section('title', 'Checkout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payment-accordion img {
            display: inline-block;
            margin-left: 10px;
            background-color: white;
        }

        form#order-place .form-control {
            border-width: 1px;
            border-color: rgb(255 255 255);
            border-style: solid;
            border-radius: 8px;
            background-color: transparent;
            height: 54px;
            padding-left: 15px;
            color: #fff;
        }

        form#order-place textarea.form-control {
            height: auto !important;
        }

        .checkoutPage {
            padding: 50px 0px;
        }

        .checkoutPage .section-heading h3 {
            margin-bottom: 30px;
        }

        .YouOrder {
            background-color: black;
            border: 1px solid white;
            color: white;
            padding: 25px;
            padding-bottom: 2px;
            /*min-height: 300px;*/
            border-radius: 3px;
            margin-bottom: 20px;
        }

        .amount-wrapper {
            padding-top: 12px;
            border-top: 2px solid white;
            text-align: left;
            margin-top: 90px;
        }

        .amount-wrapper h2 {
            font-size: 20px;
            display: flex;
            justify-content: space-between;
        }

        .amount-wrapper h3 {
            display: FLEX;
            justify-content: SPACE-BETWEEN;
            font-size: 22px;
            border-top: 2px solid white;
            padding-top: 10px;
            margin-top: 14px;
        }

        .checkoutPage span.invalid-feedback strong {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;
            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
        }

        .payment-accordion .btn-link {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px 19px;
            color: black;
        }

        .payment-accordion .card-header {
            padding: 0px !important;
        }

        .payment-accordion .card-header:first-child {
            border-radius: 0px;
        }

        .payment-accordion .card {
            border-radius: 0px;
        }

        .form-group.hide {
            display: none;
        }

        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            border-width: 1px;
            border-color: rgb(150, 163, 218);
            border-style: solid;
            margin-bottom: 10px;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        div#card-errors {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;

            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
            display: none;
            margin-bottom: 10px;
        }

        .proceed_button2 {
            background-color: transparent;
            width: 100% !important;
            color: #c0c0c0;
            border-radius: unset;
            height: 50px !important;
            border: 1px solid #c0c0c0;
        }


        a {

            text-decoration: none;
        }

        a:hover {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        h3 {
            color: #fff;
        }

        .customp {
            font-family: cursive;
            font-weight: bold;
        }

        .custompp {
            font-weight: bold;
            font-size: 17px;
        }

        #fedexfieldset legend {
            color: #fff
        }

        form#order-place select {
            /* color: #000 !important; */
            background-color: #000 !important;
        }

        ul#myTab {
            border: none;
        }

        .billing-info.col-md-12.input-style.update-btn {
            padding: 0;
        }

        .checkout_product {
            border: 1px solid #ffffff66;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .checkout_product h3 {
            font-size: 13px;
            margin-top: 10px;
        }

        .checkout_product h6 {
            font-size: 12px;
            margin-top: 8px;
        }

        .checkout_product select {
            width: 100%;
            height: 30px !important;
            padding: 0;
            border-radius: 0 !important;

            font-size: 12px;
        }

        .checkout_form_product .quantity {
            width: 50%;
        }

        .checkout_form_product .cart-btn {
            margin: 0;
        }

        .checkout_form_product .cart-btn button {
            padding: 2px 10px;
            font-size: 15px !important;

            margin-top: 0;
            border-radius: 5px;
        }

        .random_product {
            overflow: auto;
            display: flex;
            scroll-behavior: smooth;
        }

        .section-heading.dark-color {
            margin-top: 30px;
        }

        .undo_btn_form {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('content')



    <section class="heading-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-headings">
                        <h2> CHECKOUT </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="form-body checkoutPage" style="background-color:#000;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="from-boundry">
                        <div class="checkout_forms">
                            <div class="random_product">
                                @foreach ($product_detail as $get_product_detail)
                                    <div class="col-lg-4">
                                        <div class="checkout_product">
                                            <div class="productimg">
                                                <img src="{{ asset($get_product_detail->image) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="checkout_form_product">
                                                <form method="POST" action="{{ route('datacart') }}" class="add_cart_form"
                                                    id="add-cart">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $get_product_detail->id }}">

                                                    <div class="inner-product-details">
                                                        <h3 style="font-family: PEPSI_pl;" id="prod_title">
                                                            {{ $get_product_detail->product_title }}
                                                        </h3>

                                                        <h3 id="h3_original">
                                                            ${{ $get_product_detail->price }}
                                                            @if ($get_product_detail->maximum_price != '' && $get_product_detail->maximum_price != '0')
                                                                - ${{ $get_product_detail->maximum_price }}
                                                            @endif
                                                        </h3>

                                                        @php
                                                            $att_models = \App\ProductAttribute::groupBy('attribute_id')
                                                                ->where('product_id', $get_product_detail->id)
                                                                ->get();
                                                        @endphp
                                                        @foreach ($att_models as $att_model)
                                                            <h6> {{ $att_model->attribute->name }}</h6>
                                                            @php
                                                                $pro_att = \App\ProductAttribute::where([
                                                                    'attribute_id' => $att_model->attribute_id,
                                                                    'product_id' => $get_product_detail->id,
                                                                ])->get();
                                                            @endphp
                                                            <select name="variation[{{ $att_model->attribute->name }}]">
                                                                @foreach ($pro_att as $pro_atts)
                                                                    <option value="{{ $pro_atts->attributesValues->id }}">
                                                                        {{ $pro_atts->attributesValues->value }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endforeach



                                                        <h6>Quantity</h6>
                                                        <div class="quantity">
                                                            <a href="#" class="minus-1"><span>-</span></a>
                                                            <input id="qty" name="qty" type="text"
                                                                class="quantity__input input-1" readonly=""
                                                                value="1">
                                                            <a href="#" class="plus-1"><span>+</span></a>
                                                        </div>

                                                        <br>
                                                        <div class="cart-btn">
                                                            <button type="button" class="btn btn-custom" id="addCart"
                                                                style="background: red; color: white; font-weight: bold; font-size: 23px;">
                                                                Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="order_checkout">
                            <form action="{{ route('order.place') }}" method="POST" id="order-place">
                                @csrf
                                <?php $subtotal = 0;
                                $addon_total = 0;
                                $variation = 0; ?>

                                <div class="row">
                                    <div class="col-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="section-heading dark-color">
                                        <h3>User Info</h3>
                                    </div>
                                    @if (\Session::has('stripe_error'))
                                        <div class="alert alert-danger">
                                            {!! \Session::get('stripe_error') !!}
                                        </div>
                                    @endif

                                    <input type="hidden" name="payment_id" value="" />
                                    <input type="hidden" name="payer_id" value="" />
                                    <input type="hidden" name="payment_status" value="" />
                                    <input type="hidden" name="payment_method" id="payment_method" value="stripe" />


                                    @if (Auth::check())
                                        <?php $_getUser = DB::table('users')
                                            ->where('id', '=', Auth::user()->id)
                                            ->first(); ?>
                                        <div class="form-group">
                                            <input class="form-control" id="f-name" name="first_name"
                                                value="{{ old('first_name') ? old('first_name') : $_getUser->name }}"
                                                placeholder="First Name *" type="text" required>
                                            <span
                                                class="invalid-feedback fname {{ $errors->first('first_name') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input class="form-control" id="address" name="address_line_1" placeholder="Address *"
                                                type="text" value="{{ old('address_line_1') }}" required>
                                            <span class="invalid-feedback {{ $errors->first('address_line_1') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('address_line_1') }}</strong>
                                            </span>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <input class="form-control right" placeholder="Town / City *" name="city" id="city"
                                                type="text" required>
                                            <span class="invalid-feedback {{ $errors->first('city') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <input type="text" name="country" id="country" class="form-control left"
                                                placeholder="Country">
                                            <span class="invalid-feedback {{ $errors->first('country') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        </div> --}}
                                        <div class="form-group">
                                            <input class="form-control right" placeholder="Phone *" name="phone_no"
                                                type="text" value="{{ old('phone_no') }}" required>
                                            <span
                                                class="invalid-feedback {{ $errors->first('phone_no') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('phone_no') }}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control left" name="email" placeholder="Email *"
                                                type="email" value="{{ old('email') ? old('email') : $_getUser->email }}"
                                                required>
                                            <span class="invalid-feedback {{ $errors->first('email') ? 'd-block' : '' }}">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input class="form-control" id="zip_code" name="zip_code" placeholder="Postcode"
                                                type="text" value="{{ old('zip_code') }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5">{{ old('order_notes') }}</textarea>
                                        </div>

                                        <fieldset id="fedexfieldset">
                                            <legend>Shipping Address</legend>
                                            <div class="form-group">
                                                <input class="form-control" type="text" id="searchTextField"
                                                    name="googleaddress" placeholder="Type Your Address"
                                                    onchange="initialize()">
                                            </div>
                                            <div id="addressdiv">
                                                <input type="hidden" name="fedex-checker" value="0"
                                                    id="fedex-checker">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="country"
                                                        name="country" value="" placeholder="Country" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" type="text"
                                                        id="address" name="address_line_1" value=""
                                                        placeholder="Street Address" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="city"
                                                        name="city" value="" placeholder="City" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="postal"
                                                        name="postal_code" value="" placeholder="Postal Code"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="state"
                                                        name="state" value="" placeholder="State Code" required>
                                                </div>
                                                <div class="form-group">
                                                    <select name="shipping_method" id="shipping_method"
                                                        class="form-control">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="billing-info col-md-12 input-style update-btn">
                                                <ul class="nav nav-tabs shippingbutton" id="myTab" role="tablist">
                                                    <li class="nav-item shipli" role="presentation"
                                                        style="display: none">
                                                        <button id="fedexbutton" class="btn btn-primary shippingbtn"
                                                            type="button">
                                                            Fedex Button
                                                        </button>
                                                    </li>
                                                    <li class="nav-item shipli" role="presentation" style="width: 100%">
                                                        <button id="upsbutton" class="btn btn-primary shippingbtn"
                                                            type="button">
                                                            Calculate Shipping
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-12">
                                                <span id="error" class="text-danger" style="display: none"></span>
                                                <div id="loader" style="display:none">
                                                    <img src="{{ asset('images/loader.gif') }}">
                                                </div>
                                                <div id="servicesdiv" class="mb-35" style="display: none"> </div>
                                            </div>
                                        </fieldset>
                                    @else
                                        <a style="text-decoration: none;" href="{{ url('signin') }}" target="_blank"
                                            class="btn proceed_button2"> You can not purchase without authentication
                                            (Please Signin
                                            Now) </a>
                                    @endif
                                </div>
                            </form>
                            <div class="check-paymentt">
                                <div id="accordion" class="payment-accordion mt-5" hidden>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne" data-payment="paypal">
                                                    Pay with Paypal <img src="{{ asset('images/paypal.png') }}"
                                                        width="60" alt="">
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <input type="hidden" name="price" value="{{ $subtotal }}" />
                                                <input type="hidden" name="product_id" value="" />
                                                <input type="hidden" name="qty" value="value['qty']" />
                                                <div id="paypal-button-container-popup"></div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card">

                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="true"
                                                    aria-controls="collapseTwo" data-payment="stripe">
                                                    Pay with Credit Card <img src="{{ asset('images/payment1.png') }}"
                                                        alt="" width="150">
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="stripe-form-wrapper require-validation"
                                                    data-stripe-publishable-key="{{ config('services.stripe.key') }}"
                                                    data-cc-on-file="false">
                                                    <div id="card-element"></div>
                                                    <div id="card-errors" role="alert"></div>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger btn-block grandtotalstripe"
                                                            type="button" id="stripe-submit">Pay Now
                                                            ${{ $subtotal + $variation }} </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="fixed-slides">
                        <div class="YouOrder">
                            @foreach ($cart as $key => $value)
                                <?php
                                $prod_image = App\Product::where('id', $value['id'])->first();
                                ?>
                                <div class="product-cart">
                                    <div class="product-img-view">
                                        <img src="{{ asset($prod_image->image) }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="product-info">
                                        <p class="custompp">
                                            <span>
                                                {{ $value['name'] }}
                                                @if (isset($value['id']))
                                                    <a href='{{ route('remove_cart', $value['id']) }}'">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </a>
                                                @endif
                                            </span>
                                            <span class="customp">
                                                ${{ $value['baseprice'] * $value['qty'] }} </span>
                                        </p>
                                        <p class="custompp"> variation price
                                            <span class="customp">
                                                <?php $t_var = 0; ?>
                                                @foreach ($value['variation'] as $key => $values)
                                                    <?php
                                                    $t_var += $values['attribute_price'];
                                                    ?>
                                                @endforeach
                                                ${{ $t_var * $value['qty'] }}
                                                <?php $variation += $t_var * $value['qty']; ?>
                                            </span>
                                        </p>
                                        <?php $subtotal += $value['baseprice'] * $value['qty'];
                                        $variation += $value['variation_price'];
                                        ?>
                                    </div>

                                </div>
                            @endforeach
                            <div class="amount-wrapper">
                                @php
                                    $discount = session()->get('percentage', 0);
                                    if ($discount != 0) {
                                        $subtotal = $subtotal * ($discount->percentage / 100);
                                    }
                                @endphp
                                <div id="shippingdiv" class="grand-total-wrap mb-40 shippingdiv"style="display:none">
                                    <ul id="upsli">
                                        <li>
                                            Service Name
                                            <h4 id="servname">UPS Standard</h4>
                                        </li>

                                        <li>
                                            <div class="shippment-price">
                                                Shipping Total
                                                <h4 id="totalshippingh4">$0.00</h4>
                                            </div>
                                        </li>

                                        <li id="li_discount" style="display: none">

                                            <input type="checkbox" id="toggle_discount"
                                                @if (session()->get('discount')) checked @endif />
                                            <input type="hidden" name="discount" id="discount">
                                            Apply Discount
                                            <div id="discount_content"
                                                style="display: {{ session()->get('discount') ? 'block' : 'none' }};">
                                                <h4 id="h4_discount">{{ $discount ?? 0 }}</h4>
                                            </div>
                                        </li>

                                        <li id="li_gift" style="display: none">

                                            <input type="checkbox" id="toggle_gift" />
                                            <input type="hidden" name="gift" id="gift">
                                            Apply GiftCard
                                            <div id="gift_content" style="display: none">
                                                <h4 id="h4_gift"></h4>
                                            </div>

                                        </li>


                                    </ul>

                                </div>
                                <div class="">
                                    <h3>
                                        Total
                                        <hr style="color: white; height: 4px;">
                                        <span>
                                            <p class="customp" id="grandtotal">
                                                ${{ number_format($subtotal + $variation, 2) }} </p>
                                        </span>
                                    </h3>

                                    <input type="hidden" name="total_price" id="total_price"
                                        value="{{ $subtotal + $variation }}" />
                                    <input type="hidden" name="total_variation_price" value="{{ $variation }}" />

                                </div>
                            </div>


                            <hr>

                            <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>
                            <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDvh8npnQNdrlU-Ct_gwwHAaMBBDsJQtag">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        // document.getElementById("toggle_discount").addEventListener("change", function() {
        //     alert();
        //     const discountContent = document.getElementById("discount_content");
        //     if (this.checked) {
        //         discountContent.style.display = "block";

        //         // Check if the input already exists
        //         if (!document.getElementById("discount_input")) {
        //             // Create and append the input field
        //             const input = document.createElement("input");
        //             input.type = "text";
        //             input.id = "discount_input";
        //             input.placeholder = "Enter discount code";
        //             discountContent.appendChild(input);

        //             // Create and append the Apply button with an icon
        //             const applyButton = document.createElement("button");
        //             applyButton.id = "apply_discount";
        //             applyButton.innerHTML = '<i class="fas fa-check"></i> Apply';
        //             discountContent.appendChild(applyButton);

        //             // Add click event listener to Apply button
        //             applyButton.addEventListener("click", function(event) {
        //                 event.preventDefault();
        //                 const discountCode = input.value;
        //                 const baseprice = $('#total_price').val();
        //                 if (discountCode) {
        //                     // Send AJAX request to apply discount code
        //                     applyDiscount(discountCode, baseprice);
        //                 } else {
        //                     alert("Please enter a discount code.");
        //                 }
        //             });
        //         }
        //     } else {
        //         discountContent.style.display = "none";

        //         // Remove the input field and Apply button if they exist
        //         const input = document.getElementById("discount_input");
        //         if (input) {
        //             input.remove();
        //         }

        //         const applyButton = document.getElementById("apply_discount");
        //         if (applyButton) {
        //             applyButton.remove();
        //         }
        //     }
        // });

        $(document).ready(function() {
            $("body").on('change', '#toggle_discount', function() {
                let discountContent = $("#discount_content");

                if ($(this).is(":checked")) {
                    discountContent.show();

                    $("#discount_input, #apply_discount").remove();

                    let input = $("<input>", {
                        type: "text",
                        id: "discount_input",
                        placeholder: "Enter discount code",
                    });

                    let applyButton = $("<button>", {
                        id: "apply_discount",
                        html: '<i class="fas fa-check"></i> Apply',
                    });

                    discountContent.append(input, applyButton);
                } else {
                    discountContent.hide();
                    $("#discount_input, #apply_discount").remove();
                }
            });

            $(document).on("click", "#apply_discount", function(event) {
                event.preventDefault();
                let discountCode = $("#discount_input").val();
                let baseprice = $("#total_price").val(); // Getting price from input field

                if (discountCode) {
                    applyDiscount(discountCode, baseprice);
                } else {
                    alert("Please enter a discount code.");
                }
            });
        });


        // Function to send AJAX request to apply discount
        function applyDiscount(discountCode, baseprice = 0) {
            $.ajax({
                url: "{{ route('applyDiscount') }}", // Route to apply discount in Laravel
                method: 'POST',
                data: {
                    discount_code: discountCode,
                    baseprice: baseprice,
                    _token: '{{ csrf_token() }}' // Add CSRF token for security
                },
                success: function(response) {
                    if (response.success) {
                        $('#total_price').val(response.discount);
                        $('#total_price').text('$' + response.discount);
                        $('#grandtotal').text('$' + response.discount);
                        $('.grandtotalstripe').text('Pay Now $' + response.discount);
                        $('#discount_input').hide();
                        $('#apply_discount').hide();
                        $('#toggle_discount').hide();
                        $('#h4_discount').text(response.percentage + '%');
                        $('#discount').val(response.percentage);
                        alert("Discount applied successfully!");
                        // You can update the cart details on the page here using the response
                    } else {
                        alert("Failed to apply discount. " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("An error occurred. Please try again.");
                }
            });
        }

        // document.getElementById("toggle_gift").addEventListener("change", function() {
        //     const giftContent = document.getElementById("gift_content");
        //     if (this.checked) {
        //         giftContent.style.display = "block";

        //         // Check if the input already exists
        //         if (!document.getElementById("gift_input")) {
        //             // Create and append the input field
        //             const input = document.createElement("input");
        //             input.type = "text";
        //             input.id = "gift_input";
        //             input.placeholder = "Enter gift code";
        //             giftContent.appendChild(input);

        //             // Create and append the Apply button with an icon
        //             const applyButton = document.createElement("button");
        //             applyButton.id = "apply_gift";
        //             applyButton.innerHTML = '<i class="fas fa-check"></i> Apply';
        //             giftContent.appendChild(applyButton);

        //             // Add click event listener to Apply button
        //             applyButton.addEventListener("click", function(event) {
        //                 event.preventDefault();
        //                 const giftCode = input.value;
        //                 const baseprice = $('#total_price').val();
        //                 if (giftCode) {
        //                     // Send AJAX request to apply gift code
        //                     applygift(giftCode, baseprice);
        //                 } else {
        //                     alert("Please enter a gift code.");
        //                 }
        //             });
        //         }
        //     } else {
        //         giftContent.style.display = "none";

        //         // Remove the input field and Apply button if they exist
        //         const input = document.getElementById("gift_input");
        //         if (input) {
        //             input.remove();
        //         }

        //         const applyButton = document.getElementById("apply_gift");
        //         if (applyButton) {
        //             applyButton.remove();
        //         }
        //     }
        // });

        $(document).ready(function() {
            $("body").on('change', '#toggle_gift', function() {
                // $("#toggle_gift").change(function() {
                const giftContent = $("#gift_content");

                if ($(this).is(":checked")) {
                    giftContent.show();

                    // Check if the input already exists
                    if (!$("#gift_input").length) {
                        // Create and append the input field
                        const input = $("<input>", {
                            type: "text",
                            id: "gift_input",
                            placeholder: "Enter gift code"
                        });

                        // Create and append the Apply button with an icon
                        const applyButton = $("<button>", {
                            id: "apply_gift",
                            html: '<i class="fas fa-check"></i> Apply'
                        });

                        giftContent.append(input, applyButton);
                    }
                } else {
                    giftContent.hide();
                    $("#gift_input, #apply_gift").remove();
                }
            });

            // ✅ Event delegation for Apply button
            $(document).on("click", "#apply_gift", function(event) {
                event.preventDefault();
                const giftCode = $("#gift_input").val();
                const baseprice = $("#total_price").val();

                if (giftCode) {
                    applygift(giftCode, baseprice);
                } else {
                    alert("Please enter a gift code.");
                }
            });
        });


        // Function to send AJAX request to apply gift
        function applygift(giftCode, baseprice = 0) {
            $.ajax({
                url: "{{ route('applyGift') }}", // Route to apply gift in Laravel
                method: 'POST',
                data: {
                    gift_code: giftCode,
                    baseprice: baseprice,
                    _token: '{{ csrf_token() }}' // Add CSRF token for security
                },
                success: function(response) {
                    if (response.success) {
                        $('#total_price').val(response.gift);
                        $('#total_price').text('$' + response.gift);
                        $('#grandtotal').text('$' + response.gift);
                        $('.grandtotalstripe').text('Pay Now $' + response.gift);
                        $('#gift_input').hide();
                        $('#apply_gift').hide();
                        $('#toggle_gift').hide();
                        $('#h4_gift').text('$' + baseprice + ' - $' + response.balance);
                        $('#gift').val(response.balance);
                        alert("Gift applied successfully!");
                        // You can update the cart details on the page here using the response
                    } else {
                        alert("Failed to apply gift. " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("An error occurred. Please try again.");
                }
            });
        }


        $("#searchTextField").keydown(function() {
            $('#fedex-checker').val(0);
            $('#accordion').slideUp();
            $('#addressdiv').slideUp();
            $('#desctax').slideUp();
            $('#othertaxli').slideUp();
            $('#cataxli').slideUp();
            $("#shippingdiv").slideUp();
        })

        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var searchAddressComponents = place.address_components,
                    searchPostalCode = "",
                    searchAddress = "",
                    searchCity = "",
                    searchState = "",
                    searchCountryName = "",
                    searchCountryCode = "";

                $.each(searchAddressComponents, function() {
                    if (this.types[0] == "postal_code") {
                        searchPostalCode = this.short_name;
                    }
                    if (this.types[0] == "route") {
                        searchAddress = this.short_name;
                    }
                    if (this.types[0] == "locality") {
                        searchCity = this.short_name;
                    }
                    if (this.types[0] == "administrative_area_level_1") {
                        searchState = this.short_name;
                    }
                    if (this.types[0] == "country") {
                        searchCountryName = this.long_name;
                        searchCountryCode = this.short_name;
                    }
                });

                var addressArray = place.adr_address.split(',')

                var country = searchCountryCode;
                var city = searchCity;
                var address = searchAddress;
                var state = searchState;

                var postalcode = searchPostalCode;
                $('#country').val(searchCountryCode);
                $('#country-code').val(searchCountryName);

                // $('#country option[value="' + country.toString() + '"]').prop('selected', true);
                $('#city').val(city);
                $('#address').val(address);
                $('#state').val(state);
                $('#postal').val(postalcode);
                $('#addressdiv').slideDown();
                $('#fedex-checker').val(1);

                updateShippingMethods(searchCountryName);


            });
        }

        function updateShippingMethods(country) {
            const shippingMethodSelect = $('#shipping_method');
            shippingMethodSelect.empty(); // Clear existing options

            // Define an array of shipping methods for different countries
            const shippingMethodsUSA = [{
                    text: "Standard",
                    code: "11"
                },
                {
                    text: "UPS 2nd Day Air®",
                    code: "02"
                },
                {
                    text: "UPS 3 Day Select®",
                    code: "12"
                },
                {
                    text: "UPS Next Day Air®",
                    code: "14"
                },
                {
                    text: "UPS SurePost",
                    code: "93"
                }
            ];

            const shippingMethodsOthers = [{
                    text: "UPS Standard",
                    code: "11"
                },
                {
                    text: "UPS Worldwide Expedited®",
                    code: "17"
                },
                {
                    text: "UPS Worldwide Saver®",
                    code: "86"
                },
                {
                    text: "UPS Worldwide Express®",
                    code: "72"
                },
                {
                    text: "UPS SurePost",
                    code: "93"
                }
            ];

            // Determine shipping methods based on the country
            const selectedShippingMethods = (country.toLowerCase() === 'usa' || country.toLowerCase() === 'united states') ?
                shippingMethodsUSA :
                shippingMethodsOthers;


            var country = $('#country').val();
            var address = $('#address').val();
            var postal = $('#postal').val();

            var city = $('#city').val();
            var state = $('#state').val();

            // Append options and make AJAX requests for each method
            selectedShippingMethods.forEach(method => {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "{{ route('upsservices') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        country: country,
                        address: address,
                        state: state,
                        postal: postal,
                        city: city,
                        shipping_method: method.code
                    },
                    success: function(response) {
                        if (response.status) {
                            // Append the option with upsamount in the text
                            shippingMethodSelect.append(
                                new Option(`${method.text} (${response.upsamount})`, method.code)
                            );
                        } else {
                            console.error('Error in response:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            });


            $('#shippingdiv').slideDown(); // Show the shipping dropdown
        }
    </script>

    <script>
        // $(document).on('click', ".btn", function(e){
        //   $('#order-place').submit();
        // });

        $('#order-place').append('<input type="hidden" name="subtotal" value="{{ $subtotal }}" id="fedex_token">');

        $('#upsbutton').click(function() {
            $('#servname').parent().prop('hidden', ($('#country').val() == 'US'));
            $('.shippingbtn').removeClass('active');
            $('#loader').show();
            $(this).addClass("active");
            var country = $('#country').val();
            var address = $('#address').val();
            var postal = $('#postal').val();

            var city = $('#city').val();
            var state = $('#state').val();
            var shipping_method = $('#shipping_method').val();

            if (country == '' || address == '' || postal == '' || city == '') {
                // toastr.error('Please fill all address fields')
                toastr.error('Please enter a valid address.')
            } else {
                // $('#li_hidden').prop('hidden', false);
                if ($('#country').val() == 'US') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        _token: "{{ csrf_token() }}",
                        url: "{{ route('upsservices') }}",
                        type: "post",
                        dataType: "json",
                        data: {
                            country: country,
                            address: address,
                            state: state,
                            postal: postal,
                            city: city,
                            shipping_method: shipping_method,

                        },
                        success: function(response) {
                            if (response.status) {
                                $('#li_discount').show();
                                $('#li_gift').show();
                                $('#accordion').prop('hidden', false);
                                $('#li_hidden').prop('hidden', false);

                                var tax = Number('{{ $subtotal }}') + ((Number(response.tax) /
                                    100) * Number('{{ $subtotal }}'));
                                $("#ordertotalli h4").text('$' + tax.toString());
                                var ordertotal = Number(response.upsamount) + Number(tax);
                                // $('#taxli  h4').text(response.tax.toString() + "%")
                                $('#taxli  h4').text('$' + ((response.tax / 100) * parseFloat(
                                    '{{ $subtotal }}')).toFixed(2).toString())
                                if (response.description != null) {
                                    $('#desctax h4').text(response.description);
                                    $('#desctax').slideDown();
                                }

                                $('#taxli').slideDown();
                                $('#shippingamount').val(response.upsamount);
                                $('#servname').text('UPS Standard');
                                $('#totalshippingh4').text('$' + response.upsamount.toString());
                                $('#shippingdiv').slideDown();
                                $('#fedexli').hide();
                                $('#upsli').slideDown();
                                $('#grandtotal').text('$ ' + ordertotal.toFixed(2));
                                $('.grandtotalstripe').text('Pay Now $' + ordertotal.toFixed(2));
                                $('#total_price').text('$ ' + ordertotal.toFixed(2));
                                $('#amount').val(Number(ordertotal.toFixed(2)));
                                // $('#authbtn').text('Pay Now $' + ordertotal.toFixed(2));
                                $('#authbtn').text('Pay Now');
                                $('#shippinginput').val("UPS");
                                $('#accordion').slideDown();

                                $('#error').text('');
                                $('#error').hide();

                            } else {
                                $.toast({
                                    heading: 'Alert!',
                                    position: 'bottom-right',
                                    text: response.message,
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 5000,
                                    stack: 6
                                });
                            }
                        },
                        error: function(xhr) {
                            // console.error(xhr);
                            let errorMessage = "An error occurred while processing your request.";

                            const errorString = xhr.responseJSON.error;

                            // Extract the JSON part from the error string using regex
                            const jsonStringMatch = errorString.match(/{.*}/);

                            if (jsonStringMatch) {
                                try {
                                    // Parse the JSON string
                                    const response = JSON.parse(jsonStringMatch[0]);
                                    // Extract the message from the errors array
                                    if (response.response && response.response.errors && response
                                        .response.errors[0].message) {
                                        errorMessage = response.response.errors[0].message;
                                    }
                                } catch (e) {
                                    console.error("Error parsing the JSON string:", e);
                                }
                            }

                            $.toast({
                                heading: 'Alert!',
                                position: 'bottom-right',
                                text: errorMessage,
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 5000,
                                stack: 6
                            });
                        }
                    });
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        _token: "{{ csrf_token() }}",
                        url: "{{ route('upsservices') }}",
                        type: "post",
                        dataType: "json",
                        data: {
                            country: country,
                            address: address,
                            state: state,
                            postal: postal,
                            city: city,
                            shipping_method: shipping_method,

                        },
                        success: function(response) {
                            if (response.status) {
                                $('#li_discount').show();
                                $('#li_gift').show();
                                $('#li_hidden').prop('hidden', false);
                                console.clear();
                                var tax = Number('{{ $subtotal }}') + ((Number(response.tax) /
                                    100) * Number('{{ $subtotal }}'));
                                $("#ordertotalli h4").text('$' + tax.toString());
                                var ordertotal = Number(response.upsamount) + Number(tax);
                                // $('#taxli  h4').text(response.tax.toString() + "%")
                                $('#taxli  h4').text('$' + ((response.tax / 100) * parseFloat(
                                    '{{ $subtotal }}')).toFixed(2).toString())
                                if (response.description != null) {
                                    $('#desctax h4').text(response.description);
                                    $('#desctax').slideDown();
                                }

                                $('#taxli').slideDown();
                                $('#shippingamount').val(response.upsamount);
                                $('#servname').text('UPS Standard');
                                $('#totalshippingh4').text('$' + response.upsamount.toString());
                                $('#shippingdiv').slideDown();
                                $('#fedexli').hide();
                                $('#upsli').slideDown();
                                $('#grandtotal').text('$ ' + ordertotal.toFixed(2));
                                $('.grandtotalstripe').text('Pay Now $' + ordertotal.toFixed(2));
                                $('#total_price').text('$ ' + ordertotal.toFixed(2));
                                $('#amount').val(Number(ordertotal.toFixed(2)));
                                // $('#authbtn').text('Pay Now $' + ordertotal.toFixed(2));
                                $('#authbtn').text('Pay Now');
                                $('#shippinginput').val("UPS");
                                $('#accordion').slideDown();

                                $('#error').text('');
                                $('#error').hide();

                            } else {
                                $.toast({
                                    heading: 'Alert!',
                                    position: 'bottom-right',
                                    text: response.message,
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 5000,
                                    stack: 6
                                });
                            }
                        },
                        error: function(xhr) {
                            // console.error(xhr);
                            let errorMessage = "An error occurred while processing your request.";

                            const errorString = xhr.responseJSON.error;

                            // Extract the JSON part from the error string using regex
                            const jsonStringMatch = errorString.match(/{.*}/);

                            if (jsonStringMatch) {
                                try {
                                    // Parse the JSON string
                                    const response = JSON.parse(jsonStringMatch[0]);
                                    // Extract the message from the errors array
                                    if (response.response && response.response.errors && response
                                        .response.errors[0].message) {
                                        errorMessage = response.response.errors[0].message;
                                    }
                                } catch (e) {
                                    console.error("Error parsing the JSON string:", e);
                                }
                            }

                            $.toast({
                                heading: 'Alert!',
                                position: 'bottom-right',
                                text: errorMessage,
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 5000,
                                stack: 6
                            });
                        }
                    });
                }

            }

            $('#loader').hide();
            $(this).removeClass('active');


        });

        $('#fedexbutton').click(function() {
            if ($('#fedex-checker').val() == 0) {
                $('#error').text('Please Fill out the Address');
                $('#error').show();
            } else {
                alert();
                $('#accordion').slideUp();
                $('.shippingbtn').removeClass('active');
                $(this).addClass("active");
                $('#error').hide();
                $('#servicesdiv').slideUp();
                $('#loader').show();
                var country = $('#country').val();
                var address = $('#address').val();
                var postal = $('#postal').val();
                var city = $('#city').val();
                var token = $('#fedex_token').val();
                var state = $('#state').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    _token: "{{ csrf_token() }}",
                    url: "{{ route('shipping') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        country: country,
                        address: address,
                        city: city,
                        postal: postal,
                        state: state,
                        token: token,
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log(response.tax)
                            if (response.description != null) {
                                $('#desctax h4').text(response.description);
                                $('#desctax').slideDown();
                            }
                            var tax = Number('{{ $subtotal }}') + ((Number(response.tax) / 100) *
                                Number('{{ $subtotal }}'));
                            $("#ordertotalli h4").text('$' + tax.toString());
                            var ordertotal = (Number(tax) + Number(json[0]['ratedShipmentDetails'][0][
                                'totalNetFedExCharge'
                            ])).toFixed(2);
                            $('#shippingamount').val(json[0]['ratedShipmentDetails'][0][
                                'totalNetFedExCharge'
                            ]);
                            $('#loader').hide();
                            console.log(ordertotal);
                            $('#servname').text("Fedex Standard");
                            $('#shippingtotalfed').text('$ ' + json[0]['ratedShipmentDetails'][0][
                                'totalNetFedExCharge'
                            ].toString());
                            $('#grandtotal').text('$' + ordertotal);
                            $('.grandtotalstripe').text('Pay Now $' + ordertotal);
                            $('#total_price').text('$ ' + ordertotal.toFixed(2));
                            $('#shippingdiv').slideDown();
                            $('#upsli').hide();
                            $('#fedexli').slideDown();
                            // $('#authbtn').text('Pay Now $' + ordertotal);
                            $('#authbtn').text('Pay Now');
                            $('#amount').val(ordertotal);
                            $('#shippinginput').val("Fedex");
                            $('#accordion').slideDown();
                        } else {
                            $('#loader').hide();
                            if (response.err)
                                $('#error').text(response.error);
                            $('#error').show();
                        }

                    }
                })
            }
        });

        $('#accordion .btn-link').on('click', function(e) {
            if (!$(this).hasClass('collapsed')) {
                e.stopPropagation();
            }
            $('#payment_method').val($(this).attr('data-payment'));
        });

        $('.bttn').on('change', function() {
            var count = 0;
            if ($(this).prop("checked") == true) {
                if ($('#f-name').val() == "") {
                    $('.fname').text('first name is required field');
                } else {
                    $('.fname').text("");
                    count++;
                }
                if ($('#l-name').val() == "") {
                    $('.lname').text('last name is required field');
                } else {
                    $('.lname').text("");
                    count++;
                }

                if (count == 2) {
                    $('#paypal-button-container-popup').show();
                } else {
                    $(this).prop("checked", false);

                    $.toast({
                        heading: 'Alert!',
                        position: 'bottom-right',
                        text: 'Please fill the required fields before proceeding to pay',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });

                    return false;

                }

            } else {
                $('#paypal-button-container-popup').hide();
                // $('.btn').show();
            }

            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            //$(this).siblings('input[type="checkbox"]').prop('checked', false);
        });

        let paypalAmountText = $('#grandtotal').text();
        let paypalAmount = parseFloat(paypalAmountText.replace(/[$,]/g, ''));
        console.log(paypalAmount);

        paypal.Button.render({
            env: 'production', //production

            style: {
                label: 'checkout',
                size: 'responsive',
                shape: 'rect',
                color: 'gold'
            },
            client: {
                // sandbox: 'AR0NWTUnnZIoWXQR_CVmMcExhY7gigkcBfMzRAarXxJAhMk1M0Cb5vXwRbx24IUU5HY_r94D_dBSro2F',
                production: 'AQvr4F-7nIL9x_75uXUyX3X2gQgHfcg-jf_5V2ptEXECMLaXH-DFv-vTktIfZqHG8XZAEhv0wv40zl38',
            },
            validate: function(actions) {
                actions.disable();
                paypalActions = actions;
            },

            onClick: function(e) {
                var errorCount = checkEmptyFileds();

                if (errorCount == 1) {
                    $.toast({
                        heading: 'Alert!',
                        position: 'bottom-right',
                        text: 'Please fill the required fields before proceeding to pay',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });
                    paypalActions.disable();
                } else {
                    paypalActions.enable();
                }
            },
            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [{
                            amount: {
                                // total: {{ number_format((float) $subtotal + $variation, 2, '.', '') }},
                                total: paypalAmount,
                                currency: 'USD'
                            }
                        }]
                    }
                });
            },
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // generateNotification('success','Payment Authorized');

                    $.toast({
                        heading: 'Success!',
                        position: 'bottom-right',
                        text: 'Payment Authorized',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 1000,
                        stack: 6
                    });

                    var params = {
                        payment_status: 'Completed',
                        paymentID: data.paymentID,
                        payerID: data.payerID
                    };

                    // console.log(data.paymentID);
                    // return false;
                    $('input[name="payment_status"]').val('Completed');
                    $('input[name="payment_id"]').val(data.paymentID);
                    $('input[name="payer_id"]').val(data.payerID);
                    $('input[name="payment_method"]').val('paypal');
                    $('#order-place').submit();
                });
            },
            onCancel: function(data, actions) {
                var params = {
                    payment_status: 'Failed',
                    paymentID: data.paymentID
                };
                $('input[name="payment_status"]').val('Failed');
                $('input[name="payment_id"]').val(data.paymentID);
                $('input[name="payer_id"]').val('');
                $('input[name="payment_method"]').val('paypal');
            }
        }, '#paypal-button-container-popup');


        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                $(displayError).show();
                displayError.textContent = event.error.message;
            } else {
                $(displayError).hide();
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('order-place');

        $('#stripe-submit').click(function() {
            stripe.createToken(card).then(function(result) {
                var errorCount = checkEmptyFileds();
                if ((result.error) || (errorCount == 1)) {
                    // Inform the user if there was an error.
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        $(errorElement).show();
                        errorElement.textContent = result.error.message;
                    } else {
                        $.toast({
                            heading: 'Alert!',
                            position: 'bottom-right',
                            text: 'Please fill the required fields before proceeding to pay',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 5000,
                            stack: 6
                        });
                    }
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('order-place');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }


        function checkEmptyFileds() {
            var errorCount = 0;
            $('form#order-place').find('.form-control').each(function() {
                if ($(this).prop('required')) {
                    if (!$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                }
            });
            return errorCount;
        }
    </script>

    <script>
        let temp_id;
        let temp_price_id;
        var temp_price = 0;
        var select_price = 0;
        var f_select_price;
        var totalPrice = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
    </script>
    <script>
        let productId = {!! $get_product_detail->id !!}; // Laravel se product ID le rahe hain

        if (productId === 332) {
            document.addEventListener("DOMContentLoaded", function() {
                let checkbox = document.getElementById('add_price_checkbox');
                let priceElement = document.getElementById('h3_original');
                let basePrice = parseFloat("{{ $get_product_detail->price }}"); // Laravel price

                if (checkbox) {
                    checkbox.addEventListener('change', function() {
                        let selectvalue = document.getElementsByClassName('get_option').value ?? 0;
                        console.log(selectvalue);

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

                // Check if the selected option is the first option (Choose an option)
                if (selectedOption.index() === 0) {
                    selector.next('.span_selected_option_price').html('').hide();
                    return; // Stop execution if "Choose an option" is selected
                }

                // Check if a valid option is selected
                if (optionPrice !== undefined) {
                    var amount = parseFloat(optionPrice).toFixed(2);

                    if (amount == '0.00') {
                        selector.next('.span_selected_option_price').html('$0.00').show();
                    } else {
                        $('.select_price' + number).val(amount);
                        selector.next('.span_selected_option_price').html('$' + amount).show();
                    }

                    var totalPrice = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
                    $('.select_price' + number).each(function() {
                        totalPrice = (parseFloat(totalPrice) + parseFloat($(this).val())).toFixed(2);
                    });

                    $('#h3_original').prop('hidden', true);
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
    </script>


    <script type="text/javascript">
        var t_price = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
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
        //     t_price = parseFloat('{{ $get_product_detail->price }}') + temp_p; // Update t_price
        //     $('#exist_price').val(t_price);
        //     $('#h3_additional').html('$' + t_price.toFixed(2));
        // });
        function updateTotalPrice() {
            var temp_p = 0;

            // Iterate through each span and calculate the total additional price
            $('.span_selected_option_price').each(function() {
                if ($(this).text() != '') {
                    var stringWithoutDollarSign = $(this).text().replace("$", "");
                    temp_p += parseFloat(stringWithoutDollarSign);
                } else if ($(this).text() == '') {
                    temp_p += 0; // Default to 0 if the text is empty
                }
            });

            // Update total price
            var t_price = parseFloat('{{ $get_product_detail->price }}') + temp_p;
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
        //         let price = parseFloat({{ $get_product_detail->price }});
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
        $(document).on('click', '#addCart', function(e) {
            e.preventDefault();

            let button = $(this);
            let form = button.closest('form');

            let product_id = form.find('[name="product_id"]').val();
            let prod_title = form.find('#prod_title').text().trim();
            let prod_price = form.find('#h3_original').text().replace('$', '').trim();
            let qty = form.find('[name="qty"]').val() || 1;
            let productshow = form.closest('.checkout_product');

            $.ajax({
                url: "{{ route('datacart') }}",
                type: "post",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "_token": "{{ csrf_token() }}",
                    product_id: product_id,
                    name: prod_title,
                    price: prod_price,
                    qty: qty,
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        if (response.cart_count !== undefined) {
                            $('#cart_count').text(response.cart_count);
                        }

                        let productData = {
                            product_id: product_id,
                            name: prod_title,
                            price: prod_price,
                            qty: qty
                        };
                        console.log(productData);

                        productshow.hide(); // Hide product

                        // let undoBtn = $(`
                    //         <div class="col-lg-12">
                    //             <div class="undo_btn_form">
                    //                 <button class="undoCart btn btn-warning" data-product='${JSON.stringify(productData)}'>Undo</button>
                    //             </div>
                    //         </div>
                    //    `);
                        // productshow.after(undoBtn);

                        // ✅ Save to localStorage
                        let hiddenProducts = JSON.parse(localStorage.getItem('hiddenProducts')) || [];
                        if (!hiddenProducts.includes(product_id)) {
                            hiddenProducts.push(product_id);
                            localStorage.setItem('hiddenProducts', JSON.stringify(hiddenProducts));
                        }

                        $("#update-cart").load(location.href + " #update-cart");
                        $(".YouOrder").load(location.href + " .YouOrder");

                        window.location.reload();

                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error('Error: ' + xhr.responseJSON.message);
                }
            });
        });



        // ✅ Undo Button Click
        // $(document).on('click', '.undoCart', function() {
        //     let button = $(this);

        //     // ✅ Fetch and parse product data safely
        //     let productData = JSON.parse(button.attr('data-product'));

        //     if (!productData || !productData.product_id) {
        //         toastr.error("Error: Product data missing!");
        //         return;
        //     }

        //     $.ajax({
        //         url: "{{ route('undoCart') }}",
        //         type: "POST",
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             product_id: productData.product_id,
        //             name: productData.name,
        //             price: productData.price,
        //             qty: productData.qty
        //         },
        //         success: function(response) {
        //             if (response.status) {
        //                 toastr.success("Product restored!");

        //                 $('.checkout_product').each(function() {
        //                     if ($(this).find('[name="product_id"]').val() == productData
        //                         .product_id) {
        //                         $(this).show();
        //                     }
        //                 });

        //                 button.closest('.col-lg-12').remove(); // ✅ Remove Undo button container

        //                 // ✅ Remove from localStorage
        //                 let hiddenProducts = JSON.parse(localStorage.getItem('hiddenProducts')) || [];
        //                 hiddenProducts = hiddenProducts.filter(id => id !== productData.product_id);
        //                 localStorage.setItem('hiddenProducts', JSON.stringify(hiddenProducts));

        //                 $('#cart_count').text(response.cart_count);
        //                 $("#update-cart").load(location.href + " #update-cart");
        //                 $(".YouOrder").load(location.href + " .YouOrder");
        //             } else {
        //                 toastr.error("Undo failed!");
        //             }
        //         }
        //     });
        // });

        // $(document).ready(function() {
        //     let hiddenProducts = JSON.parse(localStorage.getItem('hiddenProducts')) || [];

        //     $('.checkout_product').each(function() {
        //         let product_id = $(this).find('[name="product_id"]').val();
        //         if (hiddenProducts.includes(product_id)) {
        //             $(this).hide();

        //             $(this).after(`
    //     <div class="col-lg-12">
    //         <div class="undo_btn_form">
    //             <button class="undoCart btn btn-warning" data-product='${JSON.stringify({ product_id })}'>Undo</button>
    //         </div>
    //     </div>
    // `);
        //         }
        //     });
        // });
    </script>


@endsection
