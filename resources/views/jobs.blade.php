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
            <div class="col-lg-6">
                <div class="job-discription">
                    <h3>CNC Mill Operator/ Machinist</h3>
                    <h5>Location: Saint Petersburg, FL</h5>
                    <p>Full-Time position in the Machining department for Profile Racing. The qualified candidate
                        will load/unload CNC Mills. Check parts for quality control. Minimal programming language
                        skills required. Candidate can be trained to operate individual mills and set up
                        procedures.</p>

                    <a href="{{route('front.jobDetail')}}" class="btn btn-bustom">Apply Now</a>
                </div>
                <div class="job-discription">
                    <h3>Warehouse Pick n Packer/ Builder</h3>
                    <h5>Location: Saint Petersburg, FL</h5>
                    <p>Full-Time position in the Sales department for Profile Racing distribution. The qualified candidate will be the primary pick and pack worker to fulfill sales orders. The position also includes “building” customer orders.</p>

                    <a href="{{route('front.jobDetail')}}" class="btn btn-bustom">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
