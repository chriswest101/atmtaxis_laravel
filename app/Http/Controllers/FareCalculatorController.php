<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\PriceHandler;
use App\Traits\GoogleApi;

class FareCalculatorController extends Controller
{
    use PriceHandler, GoogleApi;

    public function index()
    {
        return view('farecalculator/index')->with(array("page" => "subpage", "farecalculator" => true));
    }

    public function calculate(Request $request)
    {
        $find = array('(', ')', ' ', '');
        $fromLatLong = str_replace($find, "", $request->get('from_latlong'));
        $toLatLong = str_replace($find, "", $request->get('to_latlong'));
        $distance = preg_replace("/[^0-9.]/", "", $this->getDistanceBetweenDestinations($fromLatLong, $toLatLong));
        if (!$distance || empty($distance)) {
            return view('farecalculator/error');
        }

        $estimatedPrices = $this->getEstimatedPrice($distance);
        return view('farecalculator/quote', ['estimatedPrices' => $estimatedPrices]);
    }
}
