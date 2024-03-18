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
