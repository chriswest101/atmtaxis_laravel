<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ManageSession
{
    public function clearSession(Request $request, string $key)
    {
        $request->session()->forget($key);
        $request->session()->put($key, []);
    }

    public function storeSession(Request $request, $key, $validatedData)
    {
        foreach ($validatedData as $k => $value) {
            $request->session()->push($key . '.' . $k, $value);
        }
    }

    public function isValidBookingStage(Request $request, string $key, string $stage)
    {
        $booking = $request->session()->get('booking');
        if (!empty($booking)) {
            if (last($booking['nextstage']) != $stage) {
                return false;
            }

            return true;
        }

        return false;
    }

    public function isValidQuoteStage(Request $request, string $key, string $stage)
    {
        $booking = $request->session()->get('quote');
        if (!empty($booking)) {
            if (last($booking['nextstage']) != $stage) {
                return false;
            }

            return true;
        }

        return false;
    }
}
