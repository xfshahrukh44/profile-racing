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
                    <h2>Bike Checks</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->



<section class="bikes-inner">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-6">--}}
            <div class="col-lg-12">
                <div class="main-bikes">
                    @foreach($bike_checks as $bike_check)
                        <div class="cylce-one">
                            <a href="{{route('front.bikeCcheckDetail', $bike_check->id)}}">
                                <h5>{{$bike_check->title}}</h5>
                                <figure>
                                    <img src="{{asset($bike_check->image)}}" class="img-fluid" alt="">
                                </figure>
                            </a>
                            <div class="discription_cylce" style="color:white;">
{{--                                {!! $bike_check->ellipsisified_description(32) !!}--}}
                                {!! \Illuminate\Support\Str::limit(($bike_check->description), 150, $end='...') !!}
{{--                                <h6> January 11, 2018</h6>--}}
                                <h6>{{\Carbon\Carbon::parse($bike_check->created_at)->format('F d, Y')}}</h6>
                                <br>
                                <br>
                                <a href="{{route('front.bikeCcheckDetail', $bike_check->id)}}" class="btn btn-bustom mb-4">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="color: red !important;">
                    {{ $bike_checks->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
