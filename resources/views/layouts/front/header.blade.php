<?php $segment = Request::segment(1);?>
<?php

$logo = DB::table('imagetable')
    ->where('table_name', 'logo')
    ->first();
?>
<style>
    .modal-body.main-search {
            display: flex;
            gap: 10px;
        }

    #login_button {
        background: white;
        height: 50px;
        width: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 30px;
        font-size: 20px;
        color: black;
        transition: all ease 0.3s;
        font-size: smaller;
    }

    #cart_count {
        position: absolute;
        top: 14px;
        width: 20px;
        height: 20px;
        background: red;
        right: -2px;
        color: white;
        font-size: 75%;
        font-weight: 900;
        border-radius: 8px;
    }

    #marquee {
        background: red;
        height: 40px;
    }

    #marquee_span {
        color: white;
        font-size: 17px;
        font-weight: 600;
        letter-spacing: 4px;
    }
</style>
<header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-header">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 3rem !important"><img src="{{ asset($logo->img_path) }}" class="img-fluid" alt=""></a>
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
                                                <!--<li>-->
                                                <!--    <a class="nav-link" href="{{route('front.warrantyInfo')}}">Warranty Info</a>-->
                                                <!--</li>-->
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
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link" href="{{ route('blog') }}">Blogs</a>-->
                                    <!--</li>-->
                                    <li class="nav-item hover-links">
                                        <a class="nav-link" href="{{route('front.news')}}">News</a>
                                        <div class="dropdown-links" style="display: none; height: 99px; padding-top: 20px; margin-top: 0px; padding-bottom: 20px; margin-bottom: 0px;">
                                            <ul>
                                                <li>
                                                    <a class="nav-link" href="{{route('front.news')}}">News</a>
                                                </li>
                                                <!--<li>-->
                                                <!--    <a class="nav-link" href="{{route('front.bikeChecks')}}">Bike Checks</a>-->
                                                <!--</li>-->
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


{{--                                    <li class="nav-item">--}}
{{--                                        @if(Auth::check())--}}

{{--                                           @if(auth()->user()->role == "1")--}}

{{--                                                <a class="nav-link" href="{{ url('admin/dashboard') }}"> ADMIN DASHBOARD</a>--}}

{{--                                           @elseif(auth()->user()->role == "2")--}}

{{--                                                <a class="nav-link" href="{{ route('account') }}"> USER DASHBOARD</a>--}}

{{--                                           @endif--}}

{{--                                        @else--}}

{{--                                            <a class="nav-link" href="{{ route('signin') }}">Login</a>--}}

{{--                                        @endif--}}
{{--                                    </li>--}}

                                </ul>
                                <div class="icon-header-style">
                                    @if(Auth::check())
                                        @if(auth()->user()->role == "1")
                                            <?php $href = url('admin/dashboard'); ?>
                                        @elseif(auth()->user()->role == "2")
                                            <?php $href = route('account'); ?>
                                        @endif
                                    @else
                                        <?php $href = route('signin'); ?>
                                    @endif
                                    <a href="{{$href}}" type="button" class="text-red">
{{--                                        <span id="login_button">--}}
                                            <i class="fa-solid fa-sign-in">  </i>
{{--                                            Login--}}
{{--                                        </span>--}}
                                    </a>

                                    <a href="javascript:;" type="button" data-bs-toggle="modal" data-bs-target="#productSearchModal" class=""><i class="fa-solid fa-search"></i></a>

                                    <a href="javascript:;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="offcanvasRight">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <?php 
                                        $cart_count = count(session()->get('cart') ?? []);
                                        ?>
                                        <div id="cart_count" class="text-center">
                                            {{$cart_count}}
                                        </div>
                                    </a>

{{--                                    <?php if (Session::get('cart') && count(Session::get('cart')) > 0) { ?>--}}

{{--                                    --}}{{--                                        <a href="{{ route('cart') }}"> <i class="fa-solid fa-cart-shopping">  </i> </a>--}}
{{--                                    <a href="javascript:;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="offcanvasRight"> <i class="fa-solid fa-cart-shopping">  </i> </a>--}}

{{--                                    <?php }else{ ?>--}}

{{--                                    <a href="javascript:;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="offcanvasRight"> <i class="fa-solid fa-cart-shopping"></i></a>--}}

{{--                                    <?php } ?>--}}




                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row text-center" id="marquee">
                <span class="align-items-center mt-2" id="marquee_span">
                    Proudly Made in the USA
                </span>
            </div>
        </div>
    </header>
