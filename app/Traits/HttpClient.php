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

    public function get(string $url, string $path, array $headers)
    {
        $client = new Client([
            'headers' => $headers,
            'http_errors' => false
        ]);
        $response = $client->get($url.$path);
        return [
            "status_code" => (int)$response->getStatusCode(),
            "body" => $response->getBody()
        ];
    }
}
