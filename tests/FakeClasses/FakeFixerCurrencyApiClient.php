<?php

namespace App\Tests\FakeClasses;

use App\HttpClient\FixerCurrencyApiClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FakeFixerCurrencyApiClient implements FixerCurrencyApiClientInterface
{
    public function __construct(HttpClientInterface $client)
    {
    }

    public function getCurrencies(): array
    {
        return [
            'currencies' => [
                "AUD" => 2.4,
                "PLN" => 4.9
            ],
            'base_currency' => "EUR"
        ];
    }
}