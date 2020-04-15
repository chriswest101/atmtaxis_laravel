<?php
namespace App\Traits;

trait GoogleApi
{
    use HttpClient;

    public function getDistanceBetweenDestinations(string $fromLatLong, string $toLatLong)
    {
        $url = config('googlemaps.url');
        $apiKey = '&key='.config('googlemaps.key');
        $path = '/distancematrix/json?units=imperial&origins='.$fromLatLong.'&destinations='.$toLatLong.$apiKey;

        $response = $this->get($url, $path, []);
        $body = json_decode($response["body"], true);
        if (($response['status_code'] < 200 || $response['status_code'] >=300) || $body['status'] != 'OK')
        {
            return false;
        }

        return isset($body['rows'][0]['elements'][0]['distance']['text']) ? $body['rows'][0]['elements'][0]['distance']['text'] : "N/A";
    }
}
