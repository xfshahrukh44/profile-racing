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
                    <h2>Support</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="support-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sup-pg">
                    <h4>Support</h4>
                    <p>Profile Racing strives to always convey our passion for BMX, MTB, and Track/Cyclocross
                        bicycling to our customer and to consistently deliver the best bicycle products and
                        service possible. We sincerely believe delivering Customer Satisfaction is about providing
                        timely, responsive service with integrity, simplicity and a passion for excellence while
                        meeting or exceeding the customer’s expectations. Customer Service is any activity
                        provided by a Profile Racing employee that enhances the ability of a customer to realize
                        the full potential value of a Profile Racing product before and after the sale is made,
                        thereby leading to Customer Satisfaction and repurchase.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faqs-pg">
                    <h5>HOW-TO'S</h5>
                    <p>Text, graphical and video instructions regarding care, maintenance and repair information
                        about your Profile Racing bicycle components. You’ll also find installation discussions on
                        cranks, hubs and many other How To’s for your new and current Profile Racng components.
                    </p>
                    <a href="{{route('front.howTos')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faqs-pg">
                    <h5>FAQS</h5>
                    <p>Got a question? Check out our FAQs pages for answers to commonly asked questions. Just about
                        every qustion about our components has been asked before. There’s a good chance that your
                        question is among those in our FAQ and so is the answer.
                    </p>
                    <a href="{{route('front.faqs')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="faqs-pg">
                    <h5>MANUFACTURING</h5>
                    <p>Since 1981 Profile Racing has been manufacturing American made quality BMX and bicycle parts for competitive cyclists. It started with BMX and now we manufacture Mountain Bike (MTB) components as well as Road/Cyclocross and even components for Unicycles…
                    </p>
                    <a href="{{route('front.manufacturing')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="faqs-pg">
                    <h5>WARRANTY INFO</h5>
                    <p>Profile Racing warrants its bicycle products to be free from defects in materials or workmanship for a period of 30 days from the original date of purchase. Our chromoly cranks & spindles have a Limited Lifetime Warranty for the original owners…
                    </p>
                    <a href="{{route('front.warrantyInfo')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="faqs-pg">
                    <h5>RETURNS & EXCHANGES</h5>
                    <p>You have 30-calendar days to return an item from the date you receive it.To be eligible for a return, your item must be uninstalled, unused and in the same condition that you received it. Returns must have prior approval so please call for return authorization…
                    </p>
                    <a href="{{route('front.returns')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="faqs-pg">
                    <h5>PRIVACY POLICY</h5>
                    <p>We will not share the personal information you provide except (a) if it is for the purpose(s) you provided it; (b) with your consent; (c) as may be required by law or as we think necessary to protect our company or others from injury (e.g. in response to a court order…


                    </p>
                    <a href="{{route('front.privacy')}}" class="btn btn-bustom">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
