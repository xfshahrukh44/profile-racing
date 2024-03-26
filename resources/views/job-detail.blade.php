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
                    <h2>{{$job->title}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="machinist-job">
    <div class="container">
        <div class="row">
            <div class="col-lg-7" style="color: white;">
                <h5 style="color: red;">Location: {{$job->location}}</h5>

                {!! $job->additional_information !!}
{{--                <div class="location-job">--}}
{{--                    <h5><span>Compensation:</span>Dependent on experience and machining knowledge</h5>--}}
{{--                    <h5><span>Employment Type:</span>Full-Time</h5>--}}
{{--                    <h5><span>Job Description:</span>Full-Time CNC machinist needed to fill an open position with--}}
{{--                        our rock solid company. Great long-term employment opportunity!</h5>--}}
{{--                    <h5><span>Required Skills:</span></h5>--}}
{{--                    <p>-Proficiency on G code is a must.</p>--}}
{{--                    <p>-Use of micrometers, calipers, go-no gauges and other inspection devices.</p>--}}
{{--                    <p>-Ability to perform shop math, parts/assembly print reading.</p>--}}
{{--                    <p>-Willingness to learn.</p>--}}
{{--                    <p>-Team work oriented.</p>--}}
{{--                    <h5><span>Work Schedule: </span> 40 hours per week / 7:30 a.m. – 4 p.m. M-F.</h5>--}}
{{--                    <h5><span>NO PHONE CALLS</span></h5>--}}
{{--                    <p>Principals only. Recruiters, please don’t contact this job poster.--}}
{{--                        do NOT contact us with unsolicited services or offers</p>--}}
{{--                    <p>Profile Racing is an EOE.</p>--}}
                </div>
            </div>
            <div class="col-lg-7">
                <div class="job-form">
                    <h4>Job Application</h4>
{{--                    @if (Auth::check())--}}
                        <form action="{{route('front.submitJobApplication')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="job_id" value="{{$job->id}}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="" @error('first_name')) autofocus @enderror>

                                        @error('first_name')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control" placeholder=""
                                                @error('email') autofocus @enderror>

                                        @error('email')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" name="url" class="form-control" placeholder=""
                                                @error('url') autofocus @enderror>

                                        @error('url')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name *</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="" @error('last_name') autofocus @enderror>

                                        @error('last_name')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Cover Letter</label>
                                        <textarea name="cover_letter" class="form-control" id="textarea" cols=" 30"
                                                  rows="5" placeholder=""  @error('cover_letter') autofocus @enderror></textarea>

                                        @error('cover_letter')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Resume*</label>
                                        <input type="file" class="form-control" name="resume" id="file_up" accept="application/pdf" @error('resume') autofocus @enderror>

                                        @error('resume')
                                        <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-bustom">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
{{--                    @else--}}
{{--                        <h6 style="color: red;">Please <a href="{{route('signin')}}">login</a> to submit job application</h6>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
