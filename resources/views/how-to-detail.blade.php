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
                    <h2>How Tos</h2>
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
                    <div class="cylce-one">
                        <a href="#">
                            <h5>{{$how_to->title}}</h5>
                            <figure>
                                <img src="{{asset($how_to->image)}}" class="img-fluid" alt="">
                            </figure>
                        </a>
                        <div class="discription_cylce" style="color: white;">
                            {!! str_replace('img src="') !!}
                            {!! $how_to->description !!}
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
