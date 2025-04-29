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

        li.nav-item.shipli {
            text-align: end;
        }

        .shipping-method-option {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .shipping-method-option:hover {
            background-color: #f5f5f5;
        }

        .shipping-method-option input[type="radio"] {
            margin-right: 10px;
        }

        .shipping-method-option label {
            display: flex;
            flex-grow: 1;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            margin-bottom: 0;
        }

        .method-name {
            font-weight: bold;
        }

        .method-price {
            color: #2a6496;
            font-weight: bold;
        }

        .method-time {
            color: #666;
            font-size: 0.9em;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .grand-total {
            font-weight: bold;
            font-size: 1.1em;
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
                        <div class="order_checkout">
                            <form id="order-place" method="POST" action="{{ route('order.place') }}">
                                @csrf
                                <input type="hidden" name="payment_method" id="payment_method" value="" />
                                <input type="hidden" name="discount-amount-input" id="discount-amount-input"
                                    value="" />
                                <input type="hidden" name="gift-amount-input" id="gift-amount-input" value="" />
                                <div id="customer-info-form">

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
                                            <h3>Contact</h3>
                                        </div>

                                        @if (Auth::check())
                                            <?php $_getUser = DB::table('users')
                                                ->where('id', '=', Auth::user()->id)
                                                ->first(); ?>

                                            <div class="form-group">
                                                <input class="form-control left" name="email" placeholder="Email *"
                                                    type="email"
                                                    value="{{ old('email') ? old('email') : $_getUser->email }}" required>
                                            </div>

                                            <div class="section-heading dark-color">
                                                <h3>Shipping address</h3>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input class="form-control" id="first_name" name="first_name"
                                                            value="{{ old('first_name') ? old('first_name') : $_getUser->name }}"
                                                            placeholder="First Name *" type="text" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" id="last_name" name="last_name"
                                                            value="{{ old('last_name') ? old('last_name') : $_getUser->name }}"
                                                            placeholder="Last Name *" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" name="company" value=""
                                                    placeholder="Company (optional)">
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" id="searchTextField"
                                                    name="googleaddress" placeholder="Address" required>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" name="street_number"
                                                    value="" placeholder="Apt/ Unit# (optional)">
                                            </div>

                                            <!-- Hidden fields for address components -->
                                            <input type="hidden" name="country" id="country">
                                            <input type="hidden" name="address_line_1" id="address">
                                            <input type="hidden" name="city" id="city">
                                            <input type="hidden" name="postal_code" id="postal">
                                            <input type="hidden" name="state" id="state">

                                            <div class="form-group">
                                                <button type="button" id="continue-to-shipping"
                                                    class="btn btn-primary">Continue to Shipping</button>
                                            </div>
                                        @else
                                            <a href="{{ url('signin') }}" target="_blank" class="btn proceed_button2">
                                                You can not purchase without authentication (Please Signin Now)
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Step 2: Shipping Options Form -->
                                <div id="shipping-options-form" style="display:none;">
                                    <div class="section-heading dark-color">
                                        <h3>Shipping Options</h3>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Shipping Method</label>
                                        <div id="shipping-methods-container">
                                            <!-- Shipping options will be populated here as radio buttons -->
                                        </div>
                                    </div>

                                    {{-- <div id="shipping-loading" style="display:none;">
                                        <img src="{{ asset('assets/imgs/loader.gif') }}" alt="Loading...">
                                    </div> --}}

                                    <div id="shipping-loading" class="spinner-border text-warning" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>


                                    <div class="form-group">
                                        <button type="button" id="back-to-info" class="btn btn-secondary">Back</button>
                                        <button type="button" id="continue-to-payment" class="btn btn-primary">Continue
                                            to
                                            Payment</button>
                                    </div>
                                </div>


                                <!-- Step 3: Payment Form -->
                                <div id="payment-form" style="display:none;">
                                    <div class="section-heading dark-color">
                                        <h3>Payment Method</h3>
                                    </div>

                                    <div id="payment-accordion" class="payment-accordion">
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
                                                data-parent="#payment-accordion">
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
                                                data-parent="#payment-accordion">
                                                <div class="card-body">
                                                    <div class="stripe-form-wrapper">
                                                        <div id="card-element"></div>
                                                        <div id="card-errors" role="alert"></div>
                                                        <div class="form-group">
                                                            <button class="btn btn-danger btn-block" type="button"
                                                                id="stripe-submit">Pay Now $<span
                                                                    id="stripe-amount">0.00</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" id="back-to-shipping" class="btn btn-secondary">Back to
                                            Shipping</button>
                                    </div>
                                </div>
                            </form>
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


                                <div id="shipping-results">
                                    {{-- <div class="order-summary"> --}}
                                    {{-- <div id="taxli" style="display:none;">
                                            <h4>Tax: <span id="tax-amount">$0.00</span></h4>
                                        </div> --}}
                                    {{-- <div id="shipping-cost" style="display:none;">
                                            <h4>Shipping: <span id="shipping-amount">$0.00</span></h4>
                                        </div> --}}
                                    {{-- <div id="order-total">
                                            <h4>Total: <span id="grand-total">$0.00</span></h4>
                                        </div> --}}
                                    {{-- </div>
                                     </div> --}}

                                    <!-- Order Summary Section -->
                                    <div class="order-summary">
                                        <!-- Subtotal -->
                                        <div class="summary-item">
                                            <span>Subtotal:</span>
                                            <span>${{ number_format($subtotal, 2) }}</span>
                                        </div>

                                        <!-- Variations -->
                                        <div class="summary-item">
                                            <span>Variations:</span>
                                            <span>${{ number_format($variation, 2) }}</span>
                                        </div>

                                        <!-- Shipping (will be updated dynamically) -->
                                        <div class="summary-item" id="shipping-cost" style="display:none;">
                                            <span>Shipping:</span>
                                            <span id="shipping-amount">$0.00</span>
                                        </div>

                                        <!-- Tax (will be updated dynamically) -->
                                        {{-- <div class="summary-item" id="taxli" style="display:none;">
                                            <span>Tax:</span>
                                            <span id="tax-amount">$0.00</span>
                                        </div> --}}

                                        <!-- Discount (dynamic) -->
                                        <div class="summary-item" id="discount-row" style="display:none;">
                                            <span>Discount:</span>
                                            <span id="discount-amount">-$0.00</span>
                                        </div>

                                        <!-- Gift Card (dynamic) -->
                                        <div class="summary-item" id="gift-row" style="display:none;">
                                            <span>Gift Card:</span>
                                            <span id="gift-amount">-$0.00</span>
                                        </div>

                                        <hr>

                                        <!-- Grand Total -->

                                    </div>
                                </div>


                                <!-- Discount Section -->
                                <div class="discount-section" style="display: none;">
                                    <div class="apply-discount">
                                        <input type="checkbox" id="toggle_discount"
                                            @if (session()->has('discount')) checked @endif />
                                        <label for="toggle_discount">Apply Discount</label>
                                        <div id="discount-content"
                                            style="@if (session()->has('discount')) display:block; @else display:none; @endif">
                                            @if (session()->has('discount'))
                                                <span id="discount-code-display">{{ session('discount.code') }}</span>
                                                <span id="discount-value">-{{ session('discount.percentage') }}%</span>
                                                <button id="remove-discount" class="btn btn-sm btn-link">Remove</button>
                                            @else
                                                <input type="text" id="discount-input"
                                                    placeholder="Enter discount code">
                                                <button id="apply-discount" class="btn btn-primary">Apply</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- @php
                                session()->forget('gift_card');
                            @endphp --}}
                                <!-- Gift Card Section -->
                                <div class="gift-card-section mt-3" style="display: none;">
                                    <div class="apply-gift-card">
                                        <input type="checkbox" id="toggle_gift_card"
                                            @if (session()->has('gift_card')) checked @endif />
                                        <label for="toggle_gift_card">Apply Gift Card</label>
                                        <div id="gift-card-content"
                                            style="@if (session()->has('gift_card')) display:block; @else display:none; @endif">
                                            @if (session()->has('gift_card'))
                                                <span id="gift-card-code-display">{{ session('gift_card.code') }}</span>
                                                <span
                                                    id="gift-card-value">-${{ number_format(session('gift_card.amount'), 2) }}</span>
                                                <button id="remove-gift-card" class="btn btn-sm btn-link">Remove</button>
                                            @else
                                                <input type="text" id="gift-card-input"
                                                    placeholder="Enter gift card code">
                                                <button id="apply-gift-card" class="btn btn-primary">Apply</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Summary Rows -->
                                {{-- <div class="summary-item discount-row" id="discount-row"
                                    style="@if (session()->has('discount')) display:flex; @else display:none; @endif">
                                    <span>Discount:</span>
                                    <span id="discount-amount">
                                        @if (session()->has('discount'))
                                            -${{ number_format(session('discount.amount'), 2) }}
                                        @else
                                            -$0.00
                                        @endif
                                    </span>
                                </div>


                                <div class="summary-item" id="gift-card-row"
                                    style="@if (session()->has('gift_card')) display:flex; @else display:none; @endif">
                                    <span>Gift Card:</span>
                                    <span id="gift-card-amount">
                                        @if (session()->has('gift_card'))
                                            -${{ number_format(session('gift_card.amount'), 2) }}
                                        @else
                                            -$0.00
                                        @endif
                                    </span>
                                </div> --}}

                                <div class="summary-item grand-total" id="order-total"
                                    style="display:flex; justify-content: space-between; align-items: center;">
                                    <h4 class="m-0">Total:</h4>
                                    <span id="grand-total">${{ number_format($subtotal + $variation, 2) }}</span>
                                </div>

                                <input type="hidden" name="total_price" id="total_price"
                                    value="{{ $subtotal + $variation }}" />
                                <input type="hidden" name="total_variation_price" value="{{ $variation }}" />
                                <input type="hidden" name="shipping_method_name" id="shipping_method_name"
                                    value="" />
                                <input type="hidden" name="shipping_amount" id="shipping_amount_input"
                                    value="0" />
                            </div>

                            <hr>

                            <button type="submit" class="hvr-wobble-skew" style="display:none">Place Order</button>
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
    {{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> --}}
    <script
        src="https://www.paypal.com/sdk/js?client-id=AR0NWTUnnZIoWXQR_CVmMcExhY7gigkcBfMzRAarXxJAhMk1M0Cb5vXwRbx24IUU5HY_r94D_dBSro2F&components=buttons,marks,messages,payment-fields&enable-funding=paylater,venmo"
        data-sdk-integration-source="button-factory"></script>

    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id=AQvr4F-7nIL9x_75uXUyX3X2gQgHfcg-jf_5V2ptEXECMLaXH-DFv-vTktIfZqHG8XZAEhv0wv40zl38&components=buttons,marks,messages,payment-fields&enable-funding=paylater,venmo"
        data-sdk-integration-source="button-factory"></script> --}}
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $(document).ready(function() {
            // Initialize variables
            let subtotal = parseFloat("{{ $subtotal }}");
            let variation = parseFloat("{{ $variation }}");
            let shipping = 0;
            let tax = 0;
            let discount = parseFloat("{{ session()->get('discount') ? session()->get('discount')->amount : 0 }}");
            let gift = 0;

            // Calculate and update totals
            // function updateGrandTotal() {
            //     let total = subtotal + variation + shipping + tax - discount - gift;

            //     // Update display
            //     $('#grand-total').text('$' + total.toFixed(2));
            //     $('#total-price').val(total.toFixed(2));

            //     // Update Stripe/PayPal buttons
            //     $('.grandtotalstripe').text('Pay Now $' + total.toFixed(2));
            // }

            // Discount toggle
            $('#toggle_discount').change(function() {
                if ($(this).is(':checked')) {
                    $('#discount-content').show();

                    // If discount already applied, don't show input
                    if (!"{{ session()->get('discount') }}") {
                        $('#discount-content').html(`
                            <input type="text" id="discount-input" placeholder="Enter discount code">
                            <button id="apply-discount" class="btn btn-primary">Apply</button>
                        `);
                    }
                } else {
                    // Remove discount
                    discount = 0;
                    $('#discount-row').hide();
                    $('#discount-amount').text('-$0.00');
                    $('#discount-amount-input').val(0);
                    $('#discount-content').hide();
                    updateGrandTotal();
                }
            });

            // Apply discount
            $(document).on('click', '#apply-discount', function() {
                let code = $('#discount-input').val();

                if (code) {
                    $.ajax({
                        url: "{{ route('apply_discount') }}",
                        method: 'POST',
                        data: {
                            discount_code: code,
                            baseprice: subtotal + variation,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                discount = parseFloat(response.amount);

                                // Update display
                                $('#discount-row').show();
                                $('.discount-row').show();
                                $('#discount-amount').text('-$' + discount.toFixed(2));
                                $('#discount-amount-input').val(discount.amount);

                                // Update discount content
                                $('#discount-content').html(`
                                    <span id="discount-code-display">${code}</span>
                                    <span id="discount-value">-${response.percentage}%</span>
                                `);

                                updateGrandTotal();
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                } else {
                    alert('Please enter a discount code');
                }
            });

            // Then your event handlers and other code
            $('#toggle_gift_card').change(function() {
                if ($(this).is(':checked')) {
                    $('#gift-card-content').show();

                    var giftCardAmount =
                        {{ session()->has('gift_card') ? session('gift_card.amount') : 'null' }};
                    if (giftCardAmount !== null) {

                        $('#gift-card-content').html(`
                            <input type="text" id="gift-card-input" placeholder="Enter gift card code">
                            <button id="apply-gift-card" class="btn btn-primary">Apply</button>
                        `);
                    }
                } else {
                    // Remove gift card
                    gift = 0;
                    $('#gift-row').hide();
                    $('#gift-amount').text('-$0.00');
                    $('#gift-amount-input').val(0);
                    $('#gift-card-content').hide();
                    updateGrandTotal();
                }
            });

            // Apply gift card
            // $(document).on('click', '#apply-gift-card', function() {
            //     let code = $('#gift-card-input').val();

            //     if (code) {
            //         $.ajax({
            //             url: "{{ route('apply_gift_card') }}",
            //             method: 'POST',
            //             data: {
            //                 code: code,
            //                 subtotal: subtotal + variation,
            //                 _token: '{{ csrf_token() }}'
            //             },
            //             success: function(response) {
            //                 if (response.success) {
            //                     applyGiftCard({
            //                         code: response.gift_card.code,
            //                         amount: response.gift_card.amount
            //                     });
            //                     toastr.success('Gift card applied successfully');
            //                 } else {
            //                     toastr.error(response.message);
            //                 }
            //             },
            //             error: function(xhr) {
            //                 if (xhr.status === 422) {
            //                     var errors = xhr.responseJSON.errors;
            //                     for (var field in errors) {
            //                         toastr.error(errors[field][0]);
            //                     }
            //                 } else {
            //                     toastr.error('Error applying gift card');
            //                 }
            //             }
            //         });
            //     } else {
            //         toastr.error('Please enter a gift card code');
            //     }
            // });

            // When shipping method is selected (from your shipping code)
            function updateShippingAndTax(shippingRate, taxRate) {
                shipping = parseFloat(shippingRate);
                tax = (subtotal + variation) * (parseFloat(taxRate) / 100);

                // Update display
                $('#shipping-row').show();
                $('#shipping-amount').text('$' + shipping.toFixed(2));
                $('#shipping-amount-input').val(shipping);

                $('#tax-row').show();
                $('#tax-amount').text('$' + tax.toFixed(2));
                $('#tax-amount-input').val(tax);

                updateGrandTotal();
            }

            // Initialize with any existing discount
            @if (session()->get('discount'))
                $('#discount-row').show();
                $('#discount-amount').text('-${{ session()->get('discount')->amount }}');
            @endif

        });
    </script>

    <script>
        let temp_id;
        let temp_price_id;
        var temp_price = 0;
        var select_price = 0;
        var f_select_price;
        var totalPrice = parseFloat('{{ $get_product_detail->price }}').toFixed(2);
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
    </script>

    <script>
        $('#shipping_method').click(function() {
            $('.icon-down').toggleClass('rotated');
        });
    </script>


    <script>
        $(document).ready(function() {
            // Initialize Google Places Autocomplete
            function initAutocomplete() {
                var input = document.getElementById('searchTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function() {
                    var place = autocomplete.getPlace();
                    var addressComponents = {
                        postal_code: '',
                        route: '',
                        locality: '',
                        administrative_area_level_1: '',
                        country: ''
                    };

                    // Extract address components
                    place.address_components.forEach(function(component) {
                        if (component.types.includes('postal_code')) {
                            addressComponents.postal_code = component.short_name;
                        }
                        if (component.types.includes('route')) {
                            addressComponents.route = component.short_name;
                        }
                        if (component.types.includes('locality')) {
                            addressComponents.locality = component.short_name;
                        }
                        if (component.types.includes('administrative_area_level_1')) {
                            addressComponents.administrative_area_level_1 = component.short_name;
                        }
                        if (component.types.includes('country')) {
                            addressComponents.country = component.short_name;
                        }
                    });

                    // Update hidden fields
                    $('#country').val(addressComponents.country);
                    $('#address').val(addressComponents.route);
                    $('#city').val(addressComponents.locality);
                    $('#state').val(addressComponents.administrative_area_level_1);
                    $('#postal').val(addressComponents.postal_code);
                });
            }

            // Initialize on page load
            initAutocomplete();

            // Step 1: Customer Info to Shipping Options
            $('#continue-to-shipping').click(function() {
                // Validate required fields
                if (!$('#searchTextField').val()) {
                    toastr.error('Please enter a valid address');
                    return;
                }

                $('#customer-info-form').hide();
                $('#shipping-options-form').show();
                loadShippingOptions();
            });

            // Step 2: Back to Customer Info
            $('#back-to-info').click(function() {
                var subtotal = parseFloat("{{ $subtotal }}");
                var variation = parseFloat("{{ $variation }}");
                var grandTotal = (subtotal + variation).toFixed(2);
                $('#shipping-options-form').hide();
                $('#shipping-amount').text();
                $('#shipping-cost').hide();
                $('#grand-total').text('$' + grandTotal);
                $('#customer-info-form').show();
            });

            // Step 2: Shipping Options to Payment
            $('#continue-to-payment').click(function() {
                if (!$('input[name="shipping_method"]:checked').val()) {
                    toastr.error('Please select a shipping method');
                    return;
                }

                $('#shipping-options-form').hide();
                $('#payment-form').show();

                // Update payment button with total amount
                var total = parseFloat($('#grand-total').text().replace('$', ''));
                $('#stripe-amount').text(total.toFixed(2));

                // Initialize PayPal button with current total
                initPayPalButton();
            });

            // Step 3: Back to Shipping Options
            $('#back-to-shipping').click(function() {
                $('#payment-form').hide();
                $('#shipping-options-form').show();
            });

            // Shipping methods configuration
            const shippingMethods = {
                US: [{
                        text: "UPS Ground",
                        code: "03"
                    },
                    {
                        text: "UPS 3 Day Select",
                        code: "12"
                    },
                    {
                        text: "UPS 2nd Day Air",
                        code: "02"
                    },
                    {
                        text: "UPS Next Day Air Saver",
                        code: "13"
                    },
                    {
                        text: "UPS Next Day Air",
                        code: "01"
                    },
                    {
                        text: "UPS SurePost",
                        code: "93"
                    }
                ],
                INTERNATIONAL: [{
                        text: "UPS Standard",
                        code: "11"
                    },
                    {
                        text: "UPS Worldwide Expedited",
                        code: "08"
                    },
                    {
                        text: "UPS Worldwide Saver",
                        code: "65"
                    },
                    {
                        text: "UPS Worldwide Express",
                        code: "07"
                    },
                    {
                        text: "UPS Worldwide Express Plus",
                        code: "54"
                    }
                ]
            };

            // Function to determine available shipping methods
            function getShippingMethods(countryCode) {
                const usTerritories = ['US', 'PR', 'GU', 'AS', 'VI', 'MP'];
                return usTerritories.includes(countryCode) ? shippingMethods.US : shippingMethods.INTERNATIONAL;
            }

            // Load shipping options
            function loadShippingOptions() {
                $('#shipping-loading').show();
                $('#shipping-methods-container').empty();

                const country = $('#country').val();
                const address = $('#address').val();
                const postal = $('#postal').val();
                const city = $('#city').val();
                const state = $('#state').val();

                const availableMethods = getShippingMethods(country);

                availableMethods.forEach(method => {
                    $.ajax({
                        url: "{{ route('upsservices') }}",
                        type: "POST",
                        data: {
                            country: country,
                            address: address,
                            state: state,
                            postal: postal,
                            city: city,
                            shipping_method: method.code,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status) {
                                const radioId = `shipping-method-${method.code}`;
                                const radioHtml = `
                            <div class="shipping-method-option">
                                <input type="radio"
                                    id="${radioId}"
                                    name="shipping_method"
                                    value="${method.code}"
                                    data-rate="${response.upsamount}"
                                    data-tax="${response.tax || 0}"
                                    data-method-name="${method.text}"
                                    class="shipping-method-radio">
                                <label for="${radioId}">
                                    <span class="method-name">${method.text}</span>
                                    <span class="method-price">$${response.upsamount}</span>
                                    ${response.delivery_time ? `<span class="method-time">(${response.delivery_time})</span>` : ''}
                                </label>
                            </div>
                        `;
                                $('#shipping-methods-container').append(radioHtml);
                            }
                        },
                        error: function(xhr) {
                            console.error('Error loading shipping method:', method.text, xhr
                                .responseText);
                        },
                        complete: function() {
                            $('#shipping-loading').hide();
                        }
                    });
                });
            }

            // When shipping method is selected, update totals
            $(document).on('change', '.shipping-method-radio', function() {
                var selectedMethod = $(this).data('method-name');
                var shippingRate = parseFloat($(this).data('rate'));
                var taxRate = parseFloat($(this).data('tax')) || 0;
                var subtotal = parseFloat("{{ $subtotal }}");
                var variation = parseFloat("{{ $variation }}");

                // Calculate tax amount
                var taxAmount = ((subtotal + variation) * (taxRate / 100)).toFixed(2);

                // Calculate grand total
                var grandTotal = (subtotal + variation + parseFloat(taxAmount) + shippingRate).toFixed(2);

                // Update display
                $('#shipping-method-name').text(selectedMethod);
                $('#shipping-method-row').show();
                $('#shipping-amount').text('$' + shippingRate.toFixed(2));
                $('#shipping-cost').show();
                $('#tax-amount').text('$' + taxAmount);
                $('#tax-row').show();
                $('#grand-total').text('$' + grandTotal);

                // Update hidden fields
                $('#shipping_method_name').val(selectedMethod);
                $('#shipping_amount_input').val(shippingRate.toFixed(2));
                $('#total_price').val(grandTotal);

                $('.discount-section').show();
                $('.gift-card-section').show();
            });

            // Payment method selection
            $('#payment-accordion .btn-link').on('click', function(e) {
                if (!$(this).hasClass('collapsed')) {
                    e.stopPropagation();
                }
                $('#payment_method').val($(this).data('payment'));
            });

            // Initialize Stripe
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
            var card = elements.create('card', {
                style: {
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
                }
            });

            // Only mount card if element exists
            var cardElement = document.getElementById('card-element');
            if (cardElement) {
                card.mount('#card-element');
            }

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (displayError) {
                    if (event.error) {
                        $(displayError).show();
                        displayError.textContent = event.error.message;
                    } else {
                        $(displayError).hide();
                        displayError.textContent = '';
                    }
                }
            });

            // Handle Stripe payment submission
            $('#stripe-submit').click(function() {
                stripe.createToken(card).then(function(result) {
                    var errorCount = checkEmptyFileds();
                    if ((result.error) || (errorCount == 1)) {
                        if (result.error) {
                            var errorElement = document.getElementById('card-errors');
                            if (errorElement) {
                                $(errorElement).show();
                                errorElement.textContent = result.error.message;
                            }
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
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('order-place');
                if (form) {
                    // Remove any existing token
                    var existingToken = form.querySelector('input[name="stripeToken"]');
                    if (existingToken) {
                        form.removeChild(existingToken);
                    }

                    // Create new token input
                    $('input[name="payment_method"]').val('stripe');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                } else {
                    console.error('Form element not found');
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text: 'Unable to process payment. Please try again.',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });
                }
            }

            // Initialize PayPal Button
            var paypalButtonInitialized = false;

            function initPayPalButton() {
                if (paypalButtonInitialized) return;

                // Check if paypal object is available
                if (typeof paypal === 'undefined' || !paypal.Buttons) {
                    console.error('PayPal SDK not loaded');
                    setTimeout(initPayPalButton, 500); // Retry after delay
                    return;
                }

                let paypalAmountText = $('#grand-total').text();
                let paypalAmount = parseFloat(paypalAmountText.replace(/[$,]/g, ''));

                // Use paypal.Buttons instead of paypal.Button
                paypal.Buttons({
                    style: {
                        layout: 'vertical',
                        color: 'gold',
                        shape: 'rect',
                        label: 'checkout',
                        fundingicons: true
                    },

                    // Enable funding sources
                    funding: {
                        allowed: [
                            paypal.FUNDING.PAYPAL,
                            paypal.FUNDING.PAYLATER,
                            paypal.FUNDING.VENMO
                        ],
                        disallowed: []
                    },

                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: paypalAmount.toFixed(2)
                                }
                            }]
                        });
                    },

                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            $.toast({
                                heading: 'Success!',
                                position: 'bottom-right',
                                text: 'Payment completed by ' + details.payer.name
                                    .given_name,
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 1000,
                                stack: 6
                            });

                            $('input[name="payment_status"]').val('Completed');
                            $('input[name="payment_id"]').val(data.orderID);
                            $('input[name="payer_id"]').val(details.payer.payer_id);
                            $('input[name="payment_method"]').val('paypal');
                            $('#order-place').submit();
                        });
                    },

                    onCancel: function(data) {
                        $('input[name="payment_status"]').val('Cancelled');
                        $('input[name="payment_id"]').val(data.orderID);
                        $('input[name="payment_method"]').val('paypal');
                    },

                    onError: function(err) {
                        console.error('PayPal error:', err);
                        $.toast({
                            heading: 'Error!',
                            position: 'bottom-right',
                            text: 'An error occurred with PayPal payment',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 5000,
                            stack: 6
                        });
                    }
                }).render('#paypal-button-container-popup');

                paypalButtonInitialized = true;
            }
            // Field validation function
            function checkEmptyFileds() {
                var errorCount = 0;
                $('form#order-place').find('.form-control').each(function() {
                    if ($(this).prop('required') && !$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                });
                return errorCount;
            }

            // ==================== DISCOUNT & GIFT CARD FUNCTIONALITY ====================

            // Initialize from session if exists
            // @if (session()->has('discount'))
            //     applyDiscount({
            //         code: "{{ session('discount.code') }}",
            //         percentage: {{ session('discount.percentage') }},
            //         amount: {{ session('discount.amount') }}
            //     });
            // @endif

            // @if (session()->has('gift_card'))
            //     $(document).ready(function() {
            //         applyGiftCard({
            //             code: "{{ session('gift_card.code') }}",
            //             amount: {{ session('gift_card.amount') }}
            //         });
            //     });
            // @endif


            // Helper Functions
            function applyDiscount(discount) {
                $('#discount-row').show();
                $('#discount-amount').text('-$' + discount.amount.toFixed(2));
                $('#discount-amount-input').val('-$' + discount.amount.toFixed(2));
                $('#discount-content').html(`
                <span id="discount-code-display">${discount.code}</span>
                <span id="discount-value">-${discount.percentage}%</span>
                <button id="remove-discount" class="btn btn-sm btn-link">Remove</button>
                `);
                $('#toggle_discount').prop('disabled', true);
                updateGrandTotal();
                removediscount();
            }

            function removediscount() {
                $('#remove-discount').on('click', function() {
                    $('#toggle_discount').prop('checked', false);
                    $('#discount-content').hide();
                    $('#discount-amount').text('-$0.00');
                    $('#discount-row').hide();
                    $('#toggle_discount').prop('disabled', false);
                    updateGrandTotal();
                })
            }

            // Define all functions first
            function applyGiftCard(giftCard) {

            }

            // Remove Gift Card Helper
            function removeGiftCard() {
                $('#remove-gift-card').on('click', function() {
                    gift = 0;
                    $('#toggle_gift_card').prop('checked', false);
                    $('#gift-row').hide();
                    $('#gift-amount').text('-$0.00');
                    $('#gift-amount-input').val(0);

                    // Reset the gift card content back to input
                    $('#gift-card-content').html(`
                        <input type="text" id="gift-card-input" placeholder="Enter gift card code">
                        <button id="apply-gift-card" class="btn btn-primary">Apply</button>
                    `);
                    $('#toggle_gift_card').prop('disabled', false);

                    updateGrandTotal();
                });
            }

            function updateGrandTotal() {
                var subtotal = parseFloat("{{ $subtotal }}") || 0;
                var variation = parseFloat("{{ $variation }}") || 0;
                var shipping = parseFloat($('#shipping-amount').text().replace('$', '')) || 0;
                var tax = parseFloat($('#tax-amount').text().replace('$', '')) || 0;
                var discount = parseFloat($('#discount-amount').text().replace('-$', '')) || 0;
                var giftCard = parseFloat($('#gift-amount').text().replace('-$', '')) || 0;
                console.log(discount, giftCard, tax, shipping, variation, subtotal);

                var grandTotal = subtotal + variation + shipping + tax;
                grandTotal -= discount + giftCard;

                $('#grand-total').text('$' + grandTotal.toFixed(2));
                $('#total_price').val(grandTotal.toFixed(2));

                if ($('#payment-form').is(':visible')) {
                    $('#stripe-amount').text(grandTotal.toFixed(2));
                    initPayPalButton();
                }
            }

            // Discount Application
            $(document).on('click', '#apply-discount', function() {
                var discountCode = $('#discount-input').val().trim();
                if (!discountCode) {
                    toastr.error('Please enter a discount code');
                    return;
                }

                var subtotal = parseFloat("{{ $subtotal }}") || 0;
                var variation = parseFloat("{{ $variation }}") || 0;
                var currentTotal = subtotal + variation;

                $.ajax({
                    url: "{{ route('apply_discount') }}",
                    type: "POST",
                    data: {
                        code: discountCode,
                        subtotal: currentTotal,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            applyDiscount(response.discount);
                            toastr.success('Discount applied successfully');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            for (var field in errors) {
                                toastr.error(errors[field][0]);
                            }
                        } else {
                            toastr.error('Error applying discount');
                        }
                    }
                });
            });

            // Gift Card Application
            $(document).on('click', '#apply-gift-card', function() {
                var giftCardCode = $('#gift-card-input').val().trim();
                if (!giftCardCode) {
                    toastr.error('Please enter a gift card code');
                    return;
                }

                var subtotal = parseFloat("{{ $subtotal }}") || 0;
                var variation = parseFloat("{{ $variation }}") || 0;
                var currentTotal = subtotal + variation;

                $.ajax({
                    url: "{{ route('apply_gift_card') }}",
                    type: "POST",
                    data: {
                        code: giftCardCode,
                        subtotal: currentTotal,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            // applyGiftCard(response.gift_card);
                            var giftCard = response.gift_card;
                            var gift = parseFloat(giftCard.amount);
                            $('#gift-row').show();
                            $('.gift-card-row').show();
                            $('#gift-amount').text('-$' + gift.toFixed(2));
                            $('#gift-amount-input').val(gift);

                            $('#gift-card-content').html(`
                                <span id="gift-card-code-display">${giftCard.code}</span>
                                <span id="gift-card-value">-$${parseFloat(giftCard.amount).toFixed(2)}</span>
                                <button id="remove-gift-card" class="btn btn-sm btn-link">Remove</button>
                            `);
                            $('#toggle_gift_card').prop('disabled', true);
                            updateGrandTotal();
                            removeGiftCard();
                            toastr.success('Gift card applied successfully');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            for (var field in errors) {
                                toastr.error(errors[field][0]);
                            }
                        } else {
                            toastr.error('Error applying gift card');
                        }
                    }
                });
            });
        });
    </script>


@endsection
