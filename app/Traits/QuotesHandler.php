<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait QuotesHandler
{
    use HttpClient;

    public function makeQuote(array $booking)
    {
        $url = config('api.url');
        $headers = [
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
            'email' => $booking['email'][0],
            'no_of_people' => $booking['no_of_people'][0],
            'distance' => $booking['distance'][0]
        ];

        $response = $this->post($url, '/quotes', $payload, $headers);
        if ($response['status_code'] < 200 || $response['status_code'] >= 300) {
            return false;
        }

        return true;
    }

    public function getQuotes(string $token)
    {
        $url = config('api.url');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        
        $response = $this->get($url, '/quotes', $headers);
        $quotes = json_decode($response["body"], true);
        if ($response['status_code'] < 200 || $response['status_code'] >= 300) {
            return false;
        }
        
        return $quotes;
    }
}
