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
                    <h2>Recycling</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-about-sec for-inner history-pg recycling-pg">
    <div class="container">
        <p class="mb-4" style="color: white;">
            Profile makes all of our products in our machine shop right here in Saint Petersburg, Florida. The 16 CNC machines each generate a fair amount of “chips” (extra bits of metal) during the process of turning solid bar stock into a hub or a stem or a sprocket. We recycle all of this waste material.
        </p>
        <div class="row">
            @foreach($recyclings as $recycling)
                <div class="col-lg-6">
                    <div class="inner-about-img">
                        <img src="{{asset($recycling->image)}}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-about-txt">
                        <h3>
                            {{$recycling->title}}</h3>
                        <p>{!! $recycling->description !!}</p>
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
