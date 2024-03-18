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
                    <h2>Now Hiring: CNC Machinist</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="machinist-job">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="location-job">
                    <h5>Location: Saint Petersburg, FL</h5>
                    <h5><span>Compensation:</span>Dependent on experience and machining knowledge</h5>
                    <h5><span>Employment Type:</span>Full-Time</h5>
                    <h5><span>Job Description:</span>Full-Time CNC machinist needed to fill an open position with
                        our rock solid company. Great long-term employment opportunity!</h5>
                    <h5><span>Required Skills:</span></h5>
                    <p>-Proficiency on G code is a must.</p>
                    <p>-Use of micrometers, calipers, go-no gauges and other inspection devices.</p>
                    <p>-Ability to perform shop math, parts/assembly print reading.</p>
                    <p>-Willingness to learn.</p>
                    <p>-Team work oriented.</p>
                    <h5><span>Work Schedule: </span> 40 hours per week / 7:30 a.m. – 4 p.m. M-F.</h5>
                    <h5><span>NO PHONE CALLS</span></h5>
                    <p>Principals only. Recruiters, please don’t contact this job poster.
                        do NOT contact us with unsolicited services or offers</p>
                    <p>Profile Racing is an EOE.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="job-form">
                    <h4>Job Application</h4>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" placeholder=""
                                           required="">
                                    <span>First</span>
                                </div>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" placeholder=""
                                           required="">
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="URL" class="form-control" placeholder=""
                                           required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label></label>
                                    <input type="text" name="name" class="form-control" placeholder=""
                                           required="">
                                    <span>Last</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Cover Letter</label>
                                    <textarea name="text" class="form-control" id="textarea" cols=" 30"
                                              rows="5" placeholder="" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Resume*</label>
                                    <input type="file" class="form-control" name="Select files" id="file_up">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-bustom">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
