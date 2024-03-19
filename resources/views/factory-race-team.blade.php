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
                    <h2>Factory Race Team</h2>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section2 for-inner Freestyle-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- <div class="sec2-text">
                    <h1 class="ml2">Our Products</h1>
                </div> -->
            </div>


            @foreach($race_team_members as $race_team_member)
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="opt-sec-2-main">
                        <a href="#">
                            <div class="opt-sec2-img">
                                <figure>
                                    <img src="{{asset($race_team_member->image)}}" class="img-fluid" alt="">
                                </figure>
                            </div>
                            <div class="opt-sec2-text">
                                <h6>{{$race_team_member->name}}</h6>

                                @if ($race_team_member->facebook)
                                    <a href="{{$race_team_member->facebook}}" target="_blank">
                                        <p>Follow {{$race_team_member->name}} on Facebook</p>
                                    </a>
                                @endif

                                @if ($race_team_member->twitter)
                                    <a href="{{$race_team_member->twitter}}" target="_blank">
                                        <p>Follow {{$race_team_member->name}} on Twitter</p>
                                    </a>
                                @endif

                                @if ($race_team_member->instagram)
                                    <a href="{{$race_team_member->instagram}}" target="_blank">
                                        <p>Follow {{$race_team_member->name}} on Instagram</p>
                                    </a>
                                @endif
                            </div>
                        </a>
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
