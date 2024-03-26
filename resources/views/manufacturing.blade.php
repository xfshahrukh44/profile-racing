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
                    <h2>Manufacturing</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-about-sec for-inner history-pg">
    <div class="container">
        <div class="row align-items-center">
{{--            <div class="col-lg-7">--}}
            <div class="col-lg-12">
                <div class="inner-about-txt">
                    {!! $page->sections[0]->value ?? '' !!}
{{--                    <h3>MADE IN AMERICA – MANUFACTURING PROFILE RACING PRODUCTS</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been--}}
{{--                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley--}}
{{--                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,--}}
{{--                        but also the leap into electronic typesetting, remaining essentially unchanged. It was--}}
{{--                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,--}}
{{--                        and more recently with desktop publishing software like Aldus PageMaker including versions of--}}
{{--                        Lorem Ipsum.</p>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been--}}
{{--                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley--}}
{{--                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,--}}
{{--                        but also the leap into electronic typesetting, remaining essentially unchanged. It was--}}
{{--                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,--}}
{{--                        and more recently with desktop publishing software like Aldus PageMaker including versions of--}}
{{--                        Lorem Ipsum.</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
