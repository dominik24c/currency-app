<?php

namespace App\HttpClient;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class FixerCurrencyApiClient implements FixerCurrencyApiClientInterface
{
    private HttpClientInterface $httpClient;

    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function getCurrencies(): array
    {
        $query = [
            'access_key' => $this->apiKey
        ];

        $response = $this->httpClient->request(
            'GET',
            'http://data.fixer.io/api/latest',
            [
                'query' => $query
            ]);


        $data = json_decode($response->getContent(), true);
        $currencies = $data["rates"];
        $base = $data["base"];
        return [
            'currencies' => $currencies,
            'base_currency'=>$base
        ];
    }
}