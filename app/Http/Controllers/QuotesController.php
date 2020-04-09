<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\ManageSession;
use App\Traits\BookingHandler;
use App\Traits\GoogleApi;
use App\Traits\HttpClient;

class QuotesController extends Controller
{
    use HttpClient;
    use GoogleApi;
    use ManageSession;
    use BookingHandler;

    /**
     * Handle Quote GET Journey.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handleGet(Request $request)
    {
        $this->ClearSession($request, 'quote');
        return view('quote/stageone')->with("page", "subpage");
    }

    /**
     * Handle Quote POST Journey.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handlePost(Request $request)
    {
        $stage = $request->get('nextstage');

        if (empty($stage)) {
            return redirect()->route('quoteGet');
        }

        switch ($stage) {
            case "stagetwo":
                return $this->stageTwo($request, $stage);
            case "stagethree":
                return $this->stageThree($request, $stage);
            case "stagefour":
                return $this->stageFour($request, $stage);
            case "stagefive":
                return $this->stageFive($request, $stage);
            default:
                return redirect()->route('quoteGet');
        }
    }

    private function stageTwo(Request $request, string $stage)
    {
        $validatedData = $this->validateStageTwo($request);
        $this->StoreSession($request, 'quote', $validatedData);
        return view('quote/' . $stage)->with("page", "subpage");
    }

    private function stageThree(Request $request, string $stage)
    {
        $validatedData = $this->validateStageThree($request);
        $this->StoreSession($request, 'quote', $validatedData);
        $quote = $request->session()->get('quote');
        $find = array('(', ')', ' ', '');
        $fromLatLong = str_replace($find, "", $quote['from_latlong'][0]);
        $toLatLong = str_replace($find, "", $quote['to_latlong'][0]);
        $distance = $this->getDistanceBetweenDestinations($fromLatLong, $toLatLong);
        if (!$distance) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        $this->StoreSession($request, 'quote', ['distance' => $distance]);
        return view('quote/' . $stage)->with("page", "subpage");
    }

    private function stageFour(Request $request, string $stage)
    {
        $validatedData = $this->validateStageFour($request);
        $this->StoreSession($request, 'quote', $validatedData);
        return view('quote/' . $stage)->with(array("page" => "subpage", "quote" => $request->session()->get('quote')));
    }

    private function stageFive(Request $request, string $stage)
    {
        $this->validateStageFive($request);
        $quote = $request->session()->get('quote');
        $quoteMade = $this->makeBooking($quote, '/quotes');
        if (!$quoteMade) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        return view('quote/' . $stage)->with(array("page" => "subpage", "name" => $quote['name'][0]));
    }
}
