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
                    <h2>NEWS</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news -->

<section class="news-tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-tabs">
                    <div class="change-tabs">
                        <button class="clickabel" onclick="Opencity(event, 'all')" id="showonly">All</button>
                        <button class="clickabel" onclick="Opencity(event, 'news')">News</button>
                        <button class="clickabel" onclick="Opencity(event, 'event')">Event</button>
                        <button class="clickabel" onclick="Opencity(event, 'video')">Video</button>
                    </div>
                    <div class="change_tabs">
                        <div class="Tabone" id="all">
                            <div class="row">
                                @foreach($all_items as $all_item)
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="opt-sec-2-main">
                                            <a href="{{route('front.newsDetail', $all_item->id)}}">
                                                <div class="opt-sec2-img">
                                                    <figure>
                                                        <img src="{{asset($all_item->image)}}"
                                                             class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                                <div class="opt-sec2-text">
                                                    <p>{{$all_item->title}}</p>
                                                    <h6>{{\Carbon\Carbon::parse($all_item->created_at)->format('F d, Y')}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div style="color: red !important;">
                                {{ $all_items->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                        <div class="Tabone" id="news">
                            <div class="row">
                                @foreach($news_items as $news_item)
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="opt-sec-2-main">
                                            <a href="{{route('front.newsDetail', $news_item->id)}}">
                                                <div class="opt-sec2-img">
                                                    <figure>
                                                        <img src="{{asset($news_item->image)}}"
                                                             class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                                <div class="opt-sec2-text">
                                                    <p>{{$news_item->title}}</p>
                                                    <h6>{{\Carbon\Carbon::parse($news_item->created_at)->format('F d, Y')}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div style="color: red !important;">
                                {{ $news_items->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                        <div class="Tabone" id="event">
                            <div class="row">
                                @foreach($event_items as $event_item)
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="opt-sec-2-main">
                                            <a href="{{route('front.newsDetail', $event_item->id)}}">
                                                <div class="opt-sec2-img">
                                                    <figure>
                                                        <img src="{{asset($event_item->image)}}"
                                                             class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                                <div class="opt-sec2-text">
                                                    <p>{{$event_item->title}}</p>
                                                    <h6>{{\Carbon\Carbon::parse($event_item->created_at)->format('F d, Y')}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div style="color: red !important;">
                                {{ $event_items->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                        <div class="Tabone" id="video">
                            <div class="row">
                                @foreach($video_items as $video_item)
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="opt-sec-2-main">
                                            <a href="{{route('front.newsDetail', $video_item->id)}}">
                                                <div class="opt-sec2-img">
                                                    <figure>
                                                        <img src="{{asset($video_item->image)}}"
                                                             class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                                <div class="opt-sec2-text">
                                                    <p>{{$video_item->title}}</p>
                                                    <h6>{{\Carbon\Carbon::parse($video_item->created_at)->format('F d, Y')}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
    <script>

        function Opencity(evt, Cityname) {

            var k, Tabone, clickabel;
            Tabone = document.getElementsByClassName("Tabone");
            for (i = 0; i < Tabone.length; i++) {
                Tabone[i].style.display = "none";
            }
            clickabel = document.getElementsByClassName("clickabel");
            for (i = 0; i < clickabel.length; i++) {
                clickabel[i].className = clickabel[i].className.replace("active", "");
            }

            document.getElementById(Cityname).style.display = "block"
            evt.currentTarget.className += " active";

        }
        document.getElementById("showonly").click();



    </script>
@endsection
