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
                    <h2>Return, Exchange and Refund Policy</h2>
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
                    {!! $page->sections[0]->value ?? '' !!}
{{--                    <p>Thank you for shopping at ProfileRacing.com.</p>--}}
{{--                    <p>If you are not entirely satisfied with your purchase, we’re here to help.</p>--}}
{{--                    <p>Our products can be returned within 30-days of the delivery date of the product.</p>--}}
{{--                    <p>To be eligible for a return, exchange and/or refund, please make sure that:</p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            The product was purchased in the last 30-days--}}
{{--                        </li>--}}
{{--                        <li>The product is in its original packaging</li>--}}
{{--                        <li>--}}
{{--                            The product isn’t used or damaged--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <p>Products that do not meet these criteria will not be considered for return.</p>--}}
{{--                    <h5>What about Restocking Fees?</h5>--}}
{{--                    <p>Profile Racing does NOT charge restocking fees for returns of defective products. If you--}}
{{--                        have received the wrong product or some other shipping error, there will be NO restocking--}}
{{--                        fee and NO charge for a return label, provided the item is within our return policy period--}}
{{--                        (30-days from delivery date).</p>--}}
{{--                    <p>Restocking Fees</p>--}}
{{--                    <p>You may receive a partial refund to the original form of payment for Non-defective items--}}
{{--                        that are returned within Profile’s return policy period – 90% of the item’s purchase price--}}
{{--                    </p>--}}
{{--                    <p>Returns received in any of the following conditions may be rejected or may receive a partial--}}
{{--                        refund. </p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            Items not in original condition--}}
{{--                        </li>--}}
{{--                        <li> Items damaged</li>--}}
{{--                        <li>--}}
{{--                            Items missing accessories--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Items missing the retail box--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            Items showing obvious misuse not due to Profile’s error.--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <p>In the above cases you may receive up to 50% of the item’s purchase price if returned within--}}
{{--                        Profile’s return policy period. Rejected items will be returned at customer’s expense.</p>--}}
{{--                    <h5>CONTACT:</h5>--}}
{{--                    <p>Please contact us before you send the product:</p>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            By email: info@profileracing.com--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            By visiting this page on our website:--}}
{{--                            https://www.profileracing.com/support/terms-and-policies/--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <p>Send the product with its original packing and (copy) of the invoice to:</p>--}}
{{--                    <p>Profile Racing, Inc. Online Return </p>--}}
{{--                    <p>4803 95th Street North </p>--}}
{{--                    <p>St. Petersburg, FL 33708 USA</p>--}}
{{--                    <h5>SHIPPING CHARGES</h5>--}}
{{--                    <p>Shipping charges incurred in connection with the return of a product are non-refundable.</p>--}}
{{--                    <p>You are responsible for paying the costs of shipping and for the risk of loss of or damage to the product during shipping, both to and from Profile Racing.</p>--}}
{{--                    <h5>DAMAGED ITEMS</h5>--}}
{{--                    <p>If you received a damaged product, please notify us immediately for assistance.</p>--}}
{{--                    <h5>SALE ITEMS</h5>--}}
{{--                    <p>Unfortunately, sale items cannot be refunded. Only regular price items can be refunded.</p>--}}

{{--                    <h5>CUSTOM ORDER PRODUCTS</h5>--}}
{{--                    <P>ALL custom made products, which include but are not limited to:</P>--}}
{{--                    <P>wheels and wheelsets, hubs and cranks are Non-Refundable and Non-Returnable after order has been placed.</P>--}}
{{--                    <h5>CONTACT US</h5>--}}
{{--                    <p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>--}}
{{--                    <p>By email: info@profileracing.com</p>--}}
{{--                    <p>By visiting this page on our website: https://www.profileracing.com/support/terms-and-policies/</p>--}}
{{--                    <h5>RETURN & EXCHANGE TIME FRAME</h5>--}}
{{--                    <p>Most returns and exchanges are processed within 7 to 10 business days. However, this is just an estimate and it can be longer. </p>--}}
                </div>

            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
