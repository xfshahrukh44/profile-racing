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
                    <h2>NEWS</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->

<section class="news-tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-tabs">
                    <div class="change-tabs">
                        <button class="clickabel" onclick="Opencity(event, 'new1')" id="showonly">All</button>
                        <button class="clickabel" onclick="Opencity(event, 'new2')">News</button>
                        <button class="clickabel" onclick="Opencity(event, 'new3')">Event</button>
                        <button class="clickabel" onclick="Opencity(event, 'new4')">Video</button>
                    </div>
                    <div class="change_tabs">
                        <div class="Tabone" id="new1">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="product-1.php">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Tabone" id="new2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="product-1.php">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="Tabone" id="new3">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="product-1.php">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/spoke-and-word-episode-2-predict-245x184.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Tabone" id="new4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="product-1.php">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="opt-sec-2-main">
                                        <a href="#">
                                            <div class="opt-sec2-img">
                                                <figure>
                                                    <img src="{{asset('images/IMG_7730-184x245.jpg')}}"
                                                         class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="opt-sec2-text">
                                                <p>New Legacy Tiger Camo and Military Green 5-Panel Hats</p>
                                                <h6>March 12, 2024 </h6>
                                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
