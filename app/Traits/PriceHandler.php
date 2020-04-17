<?php
namespace App\Traits;

trait PriceHandler
{
    use HttpClient;

    public function getEstimatedPrice(string $distance)
    {
        $url = config('api.url');
        $headers = [
            'Accept'        => 'application/json',
        ];
        
        $response = $this->get($url, '/prices/estimate?distance='.$distance, $headers);
        $estimate = json_decode($response["body"], true);
        if ($response['status_code'] < 200 || $response['status_code'] >= 300) {
            return false;
        }
        
        return $estimate;
    }
}
