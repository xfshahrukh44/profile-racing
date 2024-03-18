@extends('layouts.main')

@section('css')
<style>

</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

 <!-- data-aos="zoom-in" -->
 <section class="section1">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-slider">
                          <!-- Swiper -->
  <div class="swiper mySwiper-banner">
    <div class="swiper-wrapper">
      

        @foreach($banner as $key => $val_banner)
            
            @if($key == '0')
                <div class="swiper-slide swipper-banner banner-{{ $key+1 }}">
                
                    <div class="video-banner">
                        <video width="100%" height="100%" autoplay muted>
                        <source src="{{ asset($val_banner->image) }}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="sec1-text">
                        {!! $val_banner->description !!}
                        <!-- <div class="youtube">
                            <figure>
                                <img src="images/youtube.png" class="img-fluid" alt="">
                            </figure>
                        </div> -->
                    </div>
                </div>
            @else
                <div class="swiper-slide swipper-banner banner-{{ $key+1 }}">
                    <div class="sec1-text">
                        {!! $val_banner->description !!}
                    </div>
                </div>
            @endif

        @endforeach



    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="sec2-text">
                        <h1 class="ml2">Our Products</h1>
                    </div>
                </div>

                
                @foreach($get_product as $key => $val_product) 
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="opt-sec-2-main">
                        <a href="{{ URL('product_detail/'.$val_product->id.'/'.$val_product->category.'/'.$val_product->subcategory.'/'.$val_product->childsubcategory) }}">
                            <div class="opt-sec2-img">
                                <figure>
                                <img src="{{asset($val_product->image)}}" class="img-fluid" alt="" style="height: 300px; width: 300px;"> 
                                </figure>
                            </div>
                            <div class="opt-sec2-text">
                                <p>  {{ $val_product->product_title }} </p>
                                <h6>${{ $val_product->price }}</h6>
                                <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>



    <section class="section3">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-lg-12">

                    {!! $section[0]->value !!}

                </div>


                @foreach($blog as $key => $val_blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="opt-sec3-main" data-aos="fade-up" data-aos-duration="3000">
                        <a href="{{ route('blog_detail',['id' => $val_blog->id]) }}">
                            <div class="opt-sec3-img" style="height: 250px; width: 387px;">
                                <figure>
                                    <img src="{{asset($val_blog->image)}}" alt="" style="height:100%; width:100%;">
                                </figure>
                            </div>
                            <div class="opt-sec3-text" >
                                <p> {{ $val_blog->name }} </p>
                                <span> {!! $val_blog->short_detail !!} </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>


    <section class="section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-4-text">
                        
                        {!! $section[1]->value !!}

                        <a href="{{ route('about') }}" class="btn btn-bustom">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec5-text">
                        <h1 data-aos="zoom-in">Follow Us on Instagram</h1> 
                    </div>
                </div>


                @foreach($instagram as $key => $val_instagram)
                <div class="col p-0">
                    <div class="opt-sec5-main">
                        <div class="opt-sec5-img">
                            <figure>
                                <img src="{{ asset($val_instagram->image) }}" class="img-fluid" alt="">
                            </figure>
                        </div>

                        <div class="opt-sec5-text">
                            <a href="{{ $val_instagram->link }}" style="text-decoration:none;" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                                <p>FOLLOW <span>NOW</span></p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>



@endsection

@section('js')
<script type="text/javascript"></script>
@endsection