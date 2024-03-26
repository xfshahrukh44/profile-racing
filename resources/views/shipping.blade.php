@extends('layouts.main')

@section('css')
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->



<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>UPS Ground Shipping</h2>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="terms-policy">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-7">--}}
            <div class="col-lg-12">
                <div class="policy-main">
                    <img src="{{asset($page->sections[0]->value)}}" class="img-fluid" alt="">
{{--                    <img src="{{asset('images/UPS-MAP-e1532005130543-600x514.jpg')}}" class="img-fluid" alt="">--}}

                    {!! $page->sections[1]->value ?? '' !!}
{{--                    <p>Profile Racing uses UPS shipping for its logistics. The amount of time it takes for you to--}}
{{--                        receive your order is independent of processing your order. Each online order is processed--}}
{{--                        the following business day after the order is placed and you receive a confirmation email.--}}
{{--                        If your order is out of stock you will be contacted within 24 to 48 hours to confirm--}}
{{--                        product availability & options, delivery time, and to address any concerns you may have--}}
{{--                        about your online purchase.</p>--}}
{{--                    <p>Because we assemble most online orders to your personal specifications your order may not--}}
{{--                        ship for up to 2 – 3 business days from receipt of your confirmation. Our cut-off time for--}}
{{--                        online orders is 9:00 a.m. (Eastern). Normally, orders will ship between 2 – 3 business--}}
{{--                        days after processing begins (excluding holidays) regardless of your shipping method--}}
{{--                        selected. If you have questions regarding the estimated delivery date for any order,--}}
{{--                        please email our customer support team prior to placing your order at--}}
{{--                        info@profileracing.com. Please note that your order may be subject to additional--}}
{{--                        verification of address or product availability. If more information is needed, you will--}}
{{--                        be contacted by a customer service representative shortly after placing your order. You--}}
{{--                        will receive a second email as soon as your order has been verified and processed. To--}}
{{--                        expedite the processing of your order, please be available at the phone number or email--}}
{{--                        address you provided so that we are able to contact you. If our verification department is--}}
{{--                        unable to reach you, your order may be considerably delayed.</p>--}}
{{--                    <p>Link to get an estimated ship time to your location from UPS – <a href="#">Click HERE.</a></p>--}}
{{--                    <p>We are NOT able to ship via UPS to PO Box addresses. A physical shipping address is required.</p>--}}
{{--                    <p>AN IMPORTANT NOTE ABOUT UPS SurePost®: UPS SurePost® is an economy, residential, ground service.</p>--}}
{{--                    <p>AN IMPORTANT NOTE ABOUT UPS NEXT DAY AIR/NEXT DAY AIR SAVER:  UPS delivers your package by the end of the NEXT BUSINESS DAY.</p>--}}
{{--                    <p>This service combines the consistency and reliability of the UPS Ground network with final delivery typically provided by the U.S. Postal Service. While less expensive a UPS SurePost® delivery will take a day longer than regular UPS Ground delivery. You should not choose SurePost® if your residence does not receive USPS (United States Postal Service) delivery.</p>--}}
{{--                    <h5>LOST PACKAGES</h5>--}}
{{--                    <p>Most time investigations take 7 to 10 business days. However, this is just an estimate. Some packages are found and delivered. In cases where a package is found and delivered, the shipping will be refunded to you the customer.</p>--}}
{{--                    <p>If a package is deemed lost or damage at the time of USPS’s/UPS’s conclusion of their investigation a replacement package/order is sent. The same shipping method will be used as the original order. Shipping charges will be refunded to you the customer.</p>--}}
{{--                    <p>Due to COVID-19 and unprecedented demand for our product, we are running a little behind. Our warehouse team members are working hard to ensure you receive your purchase as soon as possible, however some delays in dispatching your order may occur. Thank you.</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
