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
                    <h2>Warranty Info</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-about-sec for-inner history-pg">
    <div class="container">
        <div class="row align-items-center">
{{--            <div class="col-lg-7">--}}
            <div class="col-lg-12">
                <div class="inner-about-txt">
                    {!! $page->sections[0]->value ?? '' !!}
{{--                    <h3>PROFILE RACING HUB WARRANTY AND MAINTENANCE</h3>--}}
{{--                    <h4>Profile Racing’s Manufacturer’s Warranty</h4>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has--}}
{{--                        been--}}
{{--                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a--}}
{{--                        galley--}}
{{--                        of type and scrambled it to make a type specimen book. It has survived not only five--}}
{{--                        centuries,--}}
{{--                        but also the leap into electronic typesetting, remaining essentially unchanged. It was--}}
{{--                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum--}}
{{--                        passages,--}}
{{--                        and more recently with desktop publishing software like Aldus PageMaker including versions--}}
{{--                        of--}}
{{--                        Lorem Ipsum.</p>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has--}}
{{--                        been--}}
{{--                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a--}}
{{--                        galley--}}
{{--                        of type and scrambled it to make a type specimen book. It has survived not only five--}}
{{--                        centuries,--}}
{{--                        but also the leap into electronic typesetting, remaining essentially unchanged. It was--}}
{{--                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum--}}
{{--                        passages,--}}
{{--                        and more recently with desktop publishing software like Aldus PageMaker including versions--}}
{{--                        of--}}
{{--                        Lorem Ipsum.</p>--}}

                    {!! $page->sections[1]->value ?? '' !!}
{{--                    <h5>Maintenance</h5>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <p> 1. After riding your new rear hub/wheel for the first time, remove it from the--}}
{{--                                bike and inspect the driver springs and the pawls along with internal drive--}}
{{--                                ring. wipe clean with a lint free cloth (Do not use any type of grease, i.e..--}}
{{--                                White lithium or wheel bearing grease on the driver or drive ring). If the--}}
{{--                                driver pawls need lubrication, we recommend one drop of a light weight free hub--}}
{{--                                oil per pawl pivot point. </p>--}}
{{--                            <p><b> *Note: If you are riding everyday, then you may want to inspect the internal--}}
{{--                                    drive more often.</b></p>--}}

{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p>2. Over tightening or exceeding the recommended torque spec of your hub bolts will--}}
{{--                                crush the hub cones causing the hub to come loose. Check and make sure that your--}}
{{--                                hub body cones have not been crushed. Remove the cones and inspect the inside--}}
{{--                                race at the bottom of the cone. We recommend that the cones be replaced if there--}}
{{--                                are any signs of damage. (**Note: We recommend your hub bolts do not exceed a--}}
{{--                                maximum of 45ft-lbs.torque).</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p> 3. Wheels built at high tension will cause hubs to become loose (wobble from side--}}
{{--                                to side.). Check and make sure that the spoke tension is right. If your wheel--}}
{{--                                has side movement, check to see if your bearings are easy to push out of the hub--}}
{{--                                body or that the cones have not been crushed.</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p> 4. Planning for a new set of hubs/wheels? Make sure you look into all the--}}
{{--                                variables that may cause damage to your new hubs. Choose the right hoops/spokes--}}
{{--                                and have a professional build your wheels. In some cases the hoop/rim spoke hole--}}
{{--                                positions, lacing style, and tension can cause damage to the hub. </p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    {!! $page->sections[2]->value ?? '' !!}
{{--                    <h4>PROFILE RACING RACE CRANK LIFETIME LIMITED WARRANTY</h4>--}}
{{--                    <p>Profile Racing chromoly crankarms and chromoly spindles carry a Lifetime Limited Warranty--}}
{{--                        (except for Anniversary Vintage Box Cranks) to the original purchaser that covers bending,--}}
{{--                        cracking or breaking. Hammering, welding or any altering of the component(s) voids--}}
{{--                        warranty. Cosmetic problems are excluded. Profile Racing requires proof (or documentation)--}}
{{--                        in the form of a purchase receipt or copy of the registration stub with any warranty--}}
{{--                        claim.This policy is for like-exchange and does not include upgrades, shipping, or color--}}
{{--                        changes.</p>--}}
{{--                    <p>If you feel you have a warranty claim please email Shane in our Warranty Department at--}}
{{--                        shane@profileracing.com for information and shipping instructions regarding your warranty--}}
{{--                        claim. Our Warranty Department is open Monday through Friday (except holidays), 8 AM to--}}
{{--                        3:30 PM (Eastern).</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
