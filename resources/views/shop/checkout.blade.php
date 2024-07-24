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

                    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
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
                                <span class="invalid-feedback fname {{ $errors->first('first_name') ? 'd-block' : '' }}">
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
                                <input class="form-control right" placeholder="Phone *" name="phone_no" type="text"
                                    value="{{ old('phone_no') }}" required>
                                <span class="invalid-feedback {{ $errors->first('phone_no') ? 'd-block' : '' }}">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input class="form-control left" name="email" placeholder="Email *" type="email"
                                    value="{{ old('email') ? old('email') : $_getUser->email }}" required>
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
                                    <input class="form-control" type="text" id="searchTextField" name="googleaddress"
                                        placeholder="Type Your Address" onchange="initialize()">
                                </div>
                                <div id="addressdiv">
                                    <input type="hidden" name="fedex-checker" value="0" id="fedex-checker">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="country" name="country"
                                            value="" placeholder="Country" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" type="text" id="address"
                                            name="address_line_1" value="" placeholder="Street Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="city" name="city"
                                            value="" placeholder="City" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="postal" name="postal_code"
                                            value="" placeholder="Postal Code" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="state" name="state"
                                            value="" placeholder="State Code" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="shipping_method" id="shipping_method" class="form-control">
                                            <option value="01">Next Day Air</option>
                                            <option value="02">2nd Day Air</option>
                                            <option value="03" selected>Ground</option>
                                            <option value="07">Express</option>
                                            <option value="08">Expedited</option>
                                            <option value="11">UPS Standard</option>
                                            <option value="12">3 Day Select</option>
                                            <option value="13">Next Day Air Saver</option>
                                            <option value="14">UPS Next Day Air® Early</option>
                                            <option value="17">UPS Worldwide Economy DDU</option>
                                            <option value="54">Express Plus</option>
                                            <option value="59">2nd Day Air A.M.</option>
                                            <option value="65">UPS Saver</option>
                                            <option value="M2">First Class Mail</option>
                                            <option value="M3">Priority Mail</option>
                                            <option value="M4">Expedited MaiI Innovations</option>
                                            <option value="M5">Priority Mail Innovations</option>
                                            <option value="M6">Economy Mail Innovations</option>
                                            <option value="M7">MaiI Innovations (MI) Returns</option>
                                            <option value="70">UPS Access Point™ Economy</option>
                                            <option value="71">UPS Worldwide Express Freight Midday</option>
                                            <option value="72">UPS Worldwide Economy DDP</option>
                                            <option value="74">UPS Express®12:00</option>
                                            <option value="75">UPS Heavy Goods</option>
                                            <option value="82">UPS Today Standard</option>
                                            <option value="83">UPS Today Dedicated Courier</option>
                                            <option value="84">UPS Today Intercity</option>
                                            <option value="85">UPS Today Express</option>
                                            <option value="86">UPS Today Express Saver</option>
                                            <option value="96">UPS Worldwide Express Freight.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="billing-info col-md-12 input-style update-btn">
                                    <ul class="nav nav-tabs shippingbutton" id="myTab" role="tablist">
                                        <li class="nav-item shipli" role="presentation" style="display: none">
                                            <button id="fedexbutton" class="btn btn-primary shippingbtn" type="button">
                                                Fedex Button
                                            </button>
                                        </li>
                                        <li class="nav-item shipli" role="presentation" style="width: 100%">
                                            <button id="upsbutton" class="btn btn-primary shippingbtn" type="button">
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
                                    <div id="servicesdiv" class="mb-35" style="display: none">


                                    </div>
                                </div>


                            </fieldset>
                        @else
                            <a style="text-decoration: none;" href="{{ url('signin') }}" target="_blank"
                                class="btn proceed_button2"> You can not purchase without authentication (Please Signin
                                Now) </a>
                        @endif

                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                        <div class="section-heading dark-color">
                            <h3>YOUR ORDER</h3>
                        </div>
                        <div class="YouOrder">

                            @foreach ($cart as $key => $value)
                                {{--                    <p class="custompp"> {{ $value['name'] }} <span class="customp"> x {{ $value['qty'] }} = ${{ $value['baseprice'] * $value['qty'] }} </span> </p> --}}
                                {{--                    <p class="custompp" style="margin-top: -15px;margin-left: 15px;"> > variation price --}}
                                {{--                      --}}
                                {{--                      <span class="customp"> --}}

                                <?php $t_var = 0; ?>
                                @foreach ($value['variation'] as $key => $values)
                                    <?php
                                    $t_var += $values['attribute_price'];
                                    ?>
                                @endforeach

                                {{--                        x {{ $value['qty'] }} = ${{ $t_var * $value['qty'] }} --}}

                                <?php $variation += $t_var * $value['qty']; ?>

                                {{--                      </span> --}}
                                {{--                    --}}
                                {{--                    </p> --}}
                                {{--                    --}}
                                {{--                    <hr> --}}

                                <?php $subtotal += $value['baseprice'] * $value['qty'];
                                // $variation += $value['variation_price'];
                                ?>
                            @endforeach
                            {{--                    <div class="amount-wrapper"> --}}
                            <div id="shippingdiv" class="grand-total-wrap mb-40 shippingdiv"style="display:none">
                                <ul id="upsli">
                                    <li>
                                        Service Name
                                        <h4 id="servname">UPS Standard</h4>
                                    </li>

                                    <li>
                                        Shipping Total
                                        <h4 id="totalshippingh4">$0.00</h4>
                                    </li>

                                    <li id="li_discount" hidden>
                                        Discount
                                        <h4 id="h4_discount">asd asd ($0.00)</h4>
                                    </li>


                                </ul>

                            </div>
                            <div class="">
                                <h3>
                                    Total
                                    <hr style="color: white; height: 4px;">
                                    <span>
                                        <p class="customp" id="grandtotal"> ${{ $subtotal + $variation }} </p>
                                    </span>
                                </h3>

                                <input type="hidden" name="total_price" id="total_price"
                                    value="{{ $subtotal + $variation }}" />
                                <input type="hidden" name="total_variation_price" value="{{ $variation }}" />

                            </div>
                        </div>
{{--                        <div id="accordion" class="payment-accordion" {!! auth()->check() ? '' : 'hidden' !!}>--}}
                        <div id="accordion" class="payment-accordion" hidden>


                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne" data-payment="paypal">
                                            Pay with Paypal <img src="{{ asset('images/paypal.png') }}" width="60"
                                                alt="">
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
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                            aria-expanded="true" aria-controls="collapseTwo" data-payment="stripe">
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
                                                <button class="btn btn-danger btn-block grandtotalstripe" type="button"
                                                    id="stripe-submit">Pay Now ${{ $subtotal + $variation }} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>
                        <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->
                    </div>
                </div>

            </form>

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
                console.log(place);
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


            });
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
                                $('#accordion').prop('hidden', false);
                                $('#li_hidden').prop('hidden', false);
                                console.clear();
                                console.log(response);
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
                                $('#error').text(response.message);
                                $('#error').show();
                            }
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
                                $('#li_hidden').prop('hidden', false);
                                console.clear();
                                console.log(response);
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
                                $('#error').text(response.message);
                                $('#error').show();
                            }
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
                production:'AQvr4F-7nIL9x_75uXUyX3X2gQgHfcg-jf_5V2ptEXECMLaXH-DFv-vTktIfZqHG8XZAEhv0wv40zl38',
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
@endsection
