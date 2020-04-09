<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait BookingHandler
{
    use HttpClient;

    public function validateStageTwo(Request $request)
    {
        return $request->validate([
            'from_destination' => 'required',
            'from_latlong' => 'required'
        ]);
    }

    public function validateStageThree(Request $request)
    {
        return $request->validate([
            'to_destination' => 'required',
            'to_latlong' => 'required'
        ]);
    }

    public function validateStageFour(Request $request)
    {
        return $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required',
            'name' => 'required|string',
            'phone' => 'numeric',
            'email' => 'required|email',
            'no_of_people' => 'required|numeric'
        ]);
    }

    public function validateStageFive(Request $request)
    {
        return $request->validate([
            'gdprConsent' => 'required'
        ]);
    }

    public function makeBooking(array $booking, string $path)
    {
        $url = config('api.url');
        $token = config('api.token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $payload = [
            'from_destination' => $booking['from_destination'][0],
            'from_latlong' => str_replace(array('(', ')', ' ', ''), "", $booking['from_latlong'][0]),
            'to_destination' => $booking['to_destination'][0],
            'to_latlong' => str_replace(array('(', ')', ' ', ''), "", $booking['to_latlong'][0]),
            'date' => $booking['date'][0],
            'time' => $booking['time'][0],
            'name' => $booking['name'][0],
            'phone' => isset($booking['phone']) ? $booking['phone'][0] : "",
            'email' => $booking['email'][0],
            'no_of_people' => $booking['no_of_people'][0],
            'distance' => $booking['distance'][0]
        ];

        $response = $this->post($url, $path, $payload, $headers);
        if ($response['status_code'] < 200 || $response['status_code'] >= 300) {
            return false;
        }

        return true;
    }
}
