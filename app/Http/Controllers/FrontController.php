<?php

namespace App\Http\Controllers;

use App\Models\Bikecheck;
use App\Models\Distributor;
use App\Models\Faq;
use App\Models\GlobalMember;
use App\Models\History;
use App\Models\HowTo;
use App\Models\Job;
use App\Models\News;
use App\Models\RaceTeamMember;
use App\Models\Recycling;
use App\Models\UsMember;
use App\Page;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function myAccount (Request $request)
    {
        return view('my-account');
    }

    public function bikeChecks (Request $request)
    {
        $bike_checks = Bikecheck::paginate(10);

        return view('bike-checks', compact('bike_checks'));
    }

    public function bikeCcheckDetail (Request $request, $id)
    {
        $bike_check = Bikecheck::find($id);

        return view('bike-check-detail', compact('bike_check'));
    }

    public function distributors (Request $request)
    {
        $distributors = Distributor::all();

        return view('distributors', compact('distributors'));
    }

    public function factoryRaceTeam (Request $request)
    {
        $race_team_members = RaceTeamMember::where('status', 1)->get();

        return view('factory-race-team', compact('race_team_members'));
    }

    public function faqs (Request $request)
    {
        $faqs = Faq::all();

        return view('faqs', compact('faqs'));
    }

    public function freestyleGlobalFamily (Request $request)
    {
        $global_members = GlobalMember::all();

        return view('freestyle-global-family', compact('global_members'));
    }

    public function freestyleUsFamily (Request $request)
    {
        $us_members = UsMember::all();

        return view('freestyle-us-family', compact('us_members'));
    }

    public function history (Request $request)
    {
        $histories = History::all();

        return view('history', compact('histories'));
    }

    public function howTos (Request $request)
    {
        $how_tos = HowTo::paginate(10);

        $recent_how_tos = HowTo::orderBy('id', 'ASC')->get();

        return view('how-tos', compact('how_tos', 'recent_how_tos'));
    }

    public function howToDetail (Request $request, $id)
    {
        $how_to = HowTo::find($id);

        return view('how-to-detail', compact('how_to'));
    }

    public function jobs (Request $request)
    {
        $jobs = Job::all();

        return view('jobs', compact('jobs'));
    }

    public function jobDetail (Request $request, $id)
    {
        $job = Job::find($id);

        return view('job-detail', compact('job'));
    }

    public function manufacturing (Request $request)
    {
        $page = Page::where('name', 'Manufacturing')->first();

        return view('manufacturing', compact('page'));
    }

    public function news (Request $request)
    {
        $all_items = News::paginate(20);
        $news_items = News::where('type', 'News')->paginate(20);
        $event_items = News::where('type', 'Event')->paginate(20);
        $video_items = News::where('type', 'Video')->paginate(20);

        return view('news', compact('all_items', 'news_items', 'event_items', 'video_items'));
    }

    public function newsDetail (Request $request, $id)
    {
        $news = News::find($id);

        return view('news-detail', compact('news'));
    }

    public function recycling (Request $request)
    {
        $recyclings = Recycling::all();

        return view('recycling', compact('recyclings'));
    }

    public function returns (Request $request)
    {
        $page = Page::where('name', 'Returns')->first();

        return view('returns', compact('page'));
    }

    public function shipping (Request $request)
    {
        $page = Page::where('name', 'Shipping')->first();

        return view('shipping', compact('page'));
    }

    public function terms (Request $request)
    {
        $page = Page::where('name', 'Terms')->first();

        return view('terms', compact('page'));
    }

    public function privacy (Request $request)
    {
        $page = Page::where('name', 'Privacy')->first();

        return view('privacy', compact('page'));
    }

    public function support (Request $request)
    {
        return view('support');
    }

    public function measurements (Request $request)
    {
        return view('measurements');
    }

    public function warrantyInfo (Request $request)
    {
        $page = Page::where('name', 'Warranty')->first();

        return view('warranty-info', compact('page'));
    }

}
