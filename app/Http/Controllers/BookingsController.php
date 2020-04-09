<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\ManageSession;
use App\Traits\BookingHandler;
use App\Traits\GoogleApi;
use App\Traits\HttpClient;

class BookingsController extends Controller
{
    use HttpClient;
    use GoogleApi;
    use ManageSession;
    use BookingHandler;

    /**
     * Handle Booking GET Journey.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handleGet(Request $request)
    {
        $this->ClearSession($request, 'booking');
        return view('book/stageone')->with("page", "subpage");
    }

    /**
     * Handle Booking POST Journey.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handlePost(Request $request)
    {
        $stage = $request->get('nextstage');

        if (empty($stage)) {
            return redirect()->route('bookingsGet');
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
                return redirect()->route('bookingsGet');
        }
    }

    private function stageTwo(Request $request, string $stage)
    {
        $validatedData = $this->validateStageTwo($request);
        $this->StoreSession($request, 'booking', $validatedData);
        return view('book/' . $stage)->with("page", "subpage");
    }

    private function stageThree(Request $request, string $stage)
    {
        $validatedData = $this->validateStageThree($request);
        $this->StoreSession($request, 'booking', $validatedData);
        $booking = $request->session()->get('booking');
        $find = array('(', ')', ' ', '');
        $fromLatLong = str_replace($find, "", $booking['from_latlong'][0]);
        $toLatLong = str_replace($find, "", $booking['to_latlong'][0]);
        $distance = $this->getDistanceBetweenDestinations($fromLatLong, $toLatLong);
        if (!$distance) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        $this->StoreSession($request, 'booking', ['distance' => $distance]);
        return view('book/' . $stage)->with("page", "subpage");
    }

    private function stageFour(Request $request, string $stage)
    {
        $validatedData = $this->validateStageFour($request);
        $this->StoreSession($request, 'booking', $validatedData);
        return view('book/' . $stage)->with(array("page" => "subpage", "booking" => $request->session()->get('booking')));
    }

    private function stageFive(Request $request, string $stage)
    {
        $this->validateStageFive($request);
        $booking = $request->session()->get('booking');
        $bookingMade = $this->makeBooking($booking, '/bookings');
        if (!$bookingMade) {
            return Redirect::back()->withErrors(['Something went wrong. Please try again. If the problem persists please contact us.']);
        }

        return view('book/' . $stage)->with(array("page" => "subpage", "name" => $booking['name'][0]));
    }
}
