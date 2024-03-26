@extends('layouts.main')

@section('css')
    <style>
        li {
            list-style-type: none !important;
        }
    </style>
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
                    <h2>Profile Racing Worldwide Distributors</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="jd-cycle">
    <div class="container">
        <p class="mb-4" style="color: white;">
            Profile Racing has established long-term strategic relationships with the world’s best-known bicycle parts distributors. This relationship is based on trust and the understanding of each others objectives. Our distributors offer their customers one or several product ranges for BMX, MTB and Cyclocross. Several of our distributors are trained to be authorized service centers and they’ve been trained at our St. Petersburg, FL factory.
        </p>
        <div class="row">
            @foreach($distributors as $distributor)
                <div class="col-lg-4">
                    <div class="main-product">
                        <a href="#">
                            <img src="{{asset($distributor->image)}}" class="img-fluid" alt="">
                        </a>
                        <ul>
                            <li>
                                <h5>
                                    {{$distributor->name}}
                                    @if($distributor->location)
                                        <span class="d-block">{{$distributor->location}}</span>
                                    @endif
                                </h5>
                            </li>
                            @if($distributor->address)
                                <li>
                                    <p>{{$distributor->address}}</p>
                                </li>
                            @endif
                            @if($distributor->email)
                                <li>
                                    <a href="mailto:{{$distributor->email}}">
                                        <span>Email:</span>
                                        {{$distributor->email}}
                                    </a>
                                </li>
                            @endif
                            @if($distributor->phone)
                                <li style="color: white;">
                                    <span>PH:</span>
                                    {{$distributor->phone}}
                                </li>
                            @endif
                        </ul>

                        <a href="{{$distributor->email}}" target="_blank" class="btn btn-bustom">Connect to {{$distributor->name}}</a>
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
