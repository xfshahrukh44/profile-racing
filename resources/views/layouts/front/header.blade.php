<?php $segment = Request::segment(1);?>
<?php

$logo = DB::table('imagetable')
    ->where('table_name', 'logo')
    ->first();
?>
<header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-header">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($logo->img_path) }}" class="img-fluid" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            {{--old nav--}}
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">Home<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="{{ route('about') }}">About</a>
                                        <div class="dropdown-links" style="display: none; height: 187.5px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">
                                            <ul>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.history')}}">history</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.recycling')}}">Recycling</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.manufacturing')}}">Manufacturing</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.jobs')}}">Jobs</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.warrantyInfo')}}">Warranty Info</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="{{ route('product') }}">Products</a>
{{--                                        <div class="dropdown-links" style="display: none; height: 69.5px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a class="nav-link" href="{{route('account')}}">My Account</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
                                    </li>
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="{{route('front.news')}}">News</a>
                                        <div class="dropdown-links" style="display: none; height: 99px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">
                                            <ul>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.news')}}">News</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.bikeChecks')}}">Bike Checks</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="#">Teams</a>
                                        <div class="dropdown-links" style="display: none; height: 128.5px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">
                                            <ul>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.freestyleUsFamily')}}">Freestyle US Family</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.freestyleGlobalFamily')}}">Freestyle Global Family</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.factoryRaceTeam')}}">Factory Race Team</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="{{route('front.support')}}">Support</a>
                                        <div class="dropdown-links" style="display: none; height: 276px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">
                                            <ul>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.distributors')}}">Distributors</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.howTos')}}">How To’s</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.faqs')}}">FAQs</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.measurements')}}">Measurements</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.warrantyInfo')}}">Warranty Info</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.terms')}}">Terms &amp; Policies</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.returns')}}">Returns &amp; Exchanges</a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.shipping')}}">Shipping</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                                    </li>


                                    <li class="nav-item">
                                        @if(Auth::check())

                                           @if(auth()->user()->role == "1")

                                                <a class="nav-link" href="{{ url('admin/dashboard') }}"> ADMIN DASHBOARD</a>

                                           @elseif(auth()->user()->role == "2")

                                                <a class="nav-link" href="{{ route('account') }}"> USER DASHBOARD</a>

                                           @endif

                                        @else

                                            <a class="nav-link" href="{{ route('signin') }}">SIGNIN</a>

                                        @endif
                                    </li>

                                </ul>
                                <div class="icon-header-style">

                                    <?php if (Session::get('cart') && count(Session::get('cart')) > 0) { ?>

                                        <a href="{{ route('cart') }}"> <i class="fa-solid fa-cart-shopping">  </i> </a>

                                    <?php }else{ ?>

                                        <a href="javascript:;"><i class="fa-solid fa-cart-shopping"></i></a>

                                    <?php } ?>


                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
