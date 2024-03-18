<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Recycling;
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
        return view('bike-checks');
    }

    public function bikeCcheckDetail (Request $request)
    {
        return view('bike-check-detail');
    }

    public function distributors (Request $request)
    {
        return view('distributors');
    }

    public function factoryRaceTeam (Request $request)
    {
        return view('factory-race-team');
    }

    public function faqs (Request $request)
    {
        return view('faqs');
    }

    public function freestyleGlobalFamily (Request $request)
    {
        return view('freestyle-global-family');
    }

    public function freestyleUsFamily (Request $request)
    {
        return view('freestyle-us-family');
    }

    public function history (Request $request)
    {
        $histories = History::all();

        return view('history', compact('histories'));
    }

    public function howTos (Request $request)
    {
        return view('how-tos');
    }

    public function jobs (Request $request)
    {
        return view('jobs');
    }

    public function jobDetail (Request $request)
    {
        return view('job-detail');
    }

    public function manufacturing (Request $request)
    {
        $page = Page::where('name', 'Manufacturing')->first();

        return view('manufacturing', compact('page'));
    }

    public function news (Request $request)
    {
        return view('news');
    }

    public function recycling (Request $request)
    {
        $recyclings = Recycling::all();

        return view('recycling', compact('recyclings'));
    }

    public function returns (Request $request)
    {
        return view('returns');
    }

    public function shipping (Request $request)
    {
        return view('shipping');
    }

    public function terms (Request $request)
    {
        return view('terms');
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
        return view('warranty-info');
    }

}
