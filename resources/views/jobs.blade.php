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
                    <h2>Jobs</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="jobs-pg">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-6">--}}
            <div class="col-lg-12">
                @foreach($jobs as $job)
                    <div class="job-discription">
                        <h3>{{$job->title}}</h3>
                        <h5>Location: {{$job->location}}</h5>
                        {!! $job->description !!}

                        <a href="{{route('front.jobDetail', $job->id)}}" class="btn btn-bustom">Apply Now</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>




@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
