<?php
namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

trait HttpClient
{
    public function post(string $url, string $path, array $payload, array $headers)
    {
        $client = new Client([
            'headers' => $headers,
            'http_errors' => false
        ]);
        $response = $client->post($url.$path, [RequestOptions::JSON => $payload]);
        return [
            "status_code" => (int)$response->getStatusCode(),
            "body" => $response->getBody()
        ];
    }

    public function get(string $url, string $apiKey, string $path)
    {
        $client = new Client();
        $response = $client->get($url.$path.'&key='.$apiKey);
        return [
            "status_code" => (int)$response->getStatusCode(),
            "body" => $response->getBody()
        ];
    }
}
