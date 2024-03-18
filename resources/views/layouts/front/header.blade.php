<?php $segment = Request::segment(1);?>

<header>
        <div class="container">
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

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">Home<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('about') }}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('product') }}">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
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
