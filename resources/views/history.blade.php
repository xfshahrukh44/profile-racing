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
                    <h2>History</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-about-sec for-inner history-pg">
    <div class="container">
        <div class="row align-items-center">
            @foreach($histories as $key => $history)
                @if ($key % 2 == 0)
                    <div class="col-lg-6">
                        <div class="inner-about-txt">
                            <h3>{{$history->title}}</h3>
                            <p>{!! $history->description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-about-img">
                            <img src="{{asset($history->image)}}" class="img-fluid">
                        </div>
                    </div>
                @else
                    <div class="col-lg-6">
                        <div class="inner-about-img">
                            <img src="{{asset($history->image)}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-about-txt">
                            <h3>{{$history->title}}</h3>
                            <p>{!! $history->description !!}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>




@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
