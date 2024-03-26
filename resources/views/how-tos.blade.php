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
                    <h2>How To's</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->



<section class="bikes-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-bikes">
                    @foreach($how_tos as $how_to)
                        <div class="cylce-one">
                            <a href="{{route('front.howToDetail', $how_to->id)}}">
                                <h5>{{$how_to->title}}</h5>
                                <figure>
                                    <img src="{{asset($how_to->image)}}" class="img-fluid" alt="">
                                </figure>
                            </a>
                            <div class="discription_cylce">
{{--                                {!! $how_to->ellipsisified_description() !!}--}}
{{--                                                                <h6> January 11, 2018</h6>--}}
                                <h6>{{\Carbon\Carbon::parse($how_to->created_at)->format('F d, Y')}}</h6>
                                <a href="{{route('front.howToDetail', $how_to->id)}}" class="btn btn-bustom mb-4">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="color: red !important;">
                    {{ $how_tos->links("pagination::bootstrap-4") }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="date-month">
                    <h4>RECENT HOW-TOS</h4>
                    @foreach($recent_how_tos as $recent_how_to)
                        <div class="how-recent">
                            <p>
                                <a href="{{route('front.howToDetail', $recent_how_to->id)}}">
                                    {{$recent_how_to->title}}
                                </a>
                            </p>
                            <h5>{{\Carbon\Carbon::parse($recent_how_to->created_at)->format('F d, Y')}}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>






@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
