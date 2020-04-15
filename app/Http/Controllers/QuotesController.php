<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageFiveQuote;
use App\Http\Requests\StageFourQuote;
use App\Http\Requests\StageThreeQuote;
use App\Http\Requests\StageTwoQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\ManageSession;
use App\Traits\QuotesHandler;
use App\Traits\GoogleApi;
use App\Traits\HttpClient;
use Illuminate\Support\Facades\Auth;

class QuotesController extends Controller
{
    use HttpClient, GoogleApi, ManageSession, QuotesHandler;

    public function showFrom(Request $request)
    {
        $this->clearSession($request, 'quote');
        return view('quote/stageone')->with("page", "subpage");
    }

    public function validateFrom(StageTwoQuote $request)
    {
        $this->storeSession($request, 'quote', $request->validated());
        return redirect()->route('quote.showTo');
    }

    public function showTo(Request $request)
    {
        if (!$this->isValidQuoteStage($request, 'nextstage', 'stagetwo')) {
            return redirect()->route('quote.showFrom');
        }

        return view('quote/stagetwo')->with("page", "subpage");
    }

    public function validateTo(StageThreeQuote $request)
    {
        $this->storeSession($request, 'quote', $request->validated());
        $quote = $request->session()->get('quote');
        $find = array('(', ')', ' ', '');
        $fromLatLong = str_replace($find, "", $quote['from_latlong'][0]);
        $toLatLong = str_replace($find, "", $quote['to_latlong'][0]);
        $distance = $this->getDistanceBetweenDestinations($fromLatLong, $toLatLong);
        if (!$distance) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        $this->storeSession($request, 'quote', ['distance' => $distance]);
        return redirect()->route('quote.showDetails');
    }

    public function showDetails(Request $request)
    {
        if (!$this->isValidQuoteStage($request, 'nextstage', 'stagethree')) {
            return redirect()->route('quote.showFrom');
        }

        return view('quote/stagethree')->with(["page" => "subpage"]);
    }

    public function validateDetails(StageFourQuote $request)
    {
        $this->storeSession($request, 'quote', $request->validated());
        return redirect()->route('quote.showConfirm');
    }

    public function showConfirm(Request $request)
    {
        if (!$this->isValidQuoteStage($request, 'nextstage', 'stagefour')) {
            return redirect()->route('quote.showFrom');
        }

        return view('quote/stagefour')->with(array("page" => "subpage", "quote" => $request->session()->get('quote')));
    }

    public function validateConfirm(StageFiveQuote $request)
    {      
        $this->storeSession($request, 'quote', $request->validated());
        $quote = $request->session()->get('quote');
        $quoteMade = $this->makeQuote($quote);
        if (!$quoteMade) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }
        return redirect()->route('quote.showComplete');
    }

    public function showComplete(Request $request)
    {
        if (!$this->isValidQuoteStage($request, 'nextstage', 'stagefive')) {
            return redirect()->route('quote.showFrom');
        }
        
        $quote = $request->session()->get('quote');
        return view('quote/stagefive')->with(array("page" => "subpage", "name" => Auth::user() ? Auth::user()->name : $quote['name'][0]));
    }
}
