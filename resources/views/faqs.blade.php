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
                    <h2>FAQs</h2>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="faq-s-pg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-faqs">
                    <div class="faq-one">
                        <div id="accordion">
                            @foreach($faqs as $faq)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne_{{$faq->id}}" aria-expanded="true"
                                                    aria-controls="collapseOne_{{$faq->id}}">
                                                {{$faq->question}}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne_{{$faq->id}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
