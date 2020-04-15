<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageFiveBooking;
use App\Http\Requests\StageFourBooking;
use App\Http\Requests\StageThreeBooking;
use App\Http\Requests\StageTwoBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\ManageSession;
use App\Traits\BookingHandler;
use App\Traits\GoogleApi;
use App\Traits\HttpClient;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    use HttpClient, GoogleApi, ManageSession, BookingHandler;

    public function showFrom(Request $request)
    {
        $this->clearSession($request, 'booking');
        return view('book/stageone')->with("page", "subpage");
    }

    public function validateFrom(StageTwoBooking $request)
    {
        $this->storeSession($request, 'booking', $request->validated());
        return redirect()->route('booking.showTo');
    }

    public function showTo(Request $request)
    {
        if (!$this->isValidBookingStage($request, 'nextstage', 'stagetwo')) {
            return redirect()->route('booking.showFrom');
        }

        return view('book/stagetwo')->with("page", "subpage");
    }

    public function validateTo(StageThreeBooking $request)
    {
        $this->storeSession($request, 'booking', $request->validated());
        $booking = $request->session()->get('booking');
        $find = array('(', ')', ' ', '');
        $fromLatLong = str_replace($find, "", $booking['from_latlong'][0]);
        $toLatLong = str_replace($find, "", $booking['to_latlong'][0]);
        $distance = $this->getDistanceBetweenDestinations($fromLatLong, $toLatLong);
        if (!$distance) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        $this->storeSession($request, 'booking', ['distance' => $distance]);
        return redirect()->route('booking.showDetails');
    }

    public function showDetails(Request $request)
    {
        if (!$this->isValidBookingStage($request, 'nextstage', 'stagethree')) {
            return redirect()->route('booking.showFrom');
        }

        return view('book/stagethree')->with(["page" => "subpage"]);
    }

    public function validateDetails(StageFourBooking $request)
    {
        $this->storeSession($request, 'booking', $request->validated());
        return redirect()->route('booking.showConfirm');
    }

    public function showConfirm(Request $request)
    {
        if (!$this->isValidBookingStage($request, 'nextstage', 'stagefour')) {
            return redirect()->route('booking.showFrom');
        }

        return view('book/stagefour')->with(array("page" => "subpage", "booking" => $request->session()->get('booking')));
    }

    public function validateConfirm(StageFiveBooking $request)
    {      
        $this->storeSession($request, 'booking', $request->validated());
        $booking = $request->session()->get('booking');
        $bookingMade = $this->makeBooking($booking);
        if (!$bookingMade) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }
        return redirect()->route('booking.showComplete');
    }

    public function showComplete(Request $request)
    {
        if (!$this->isValidBookingStage($request, 'nextstage', 'stagefive')) {
            return redirect()->route('booking.showFrom');
        }
        
        return view('book/stagefive')->with(array("page" => "subpage", "name" => Auth::user()->name));
    }
}
