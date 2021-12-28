<?php

namespace App\Tests;

use App\HttpClient\FixerCurrencyApiClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class FixerCurrencyApiClientTest extends \PHPUnit\Framework\TestCase
{
    public function testGetCurrencies(): void
    {
        $data = [
            "base" => "EUR",
            "rates" => [
                "AUD" => 2.34, "USD" => 2.1
            ]
        ];
        $mock = $this->createMock(HttpClientInterface::class);
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getContent')->willReturn(json_encode($data));

        $mock->method('request')->willReturn($responseMock);
        $key = "secret";
        $client = new FixerCurrencyApiClient($mock, $key);
        $arr = $client->getCurrencies();


        $this->assertIsArray($arr);
        $this->assertSame("EUR", $arr["base_currency"]);
        $this->assertCount(2, $arr["currencies"]);
        $this->assertSame(2.34, $arr["currencies"]["AUD"]);
        $this->assertSame(2.1, $arr["currencies"]["USD"]);

    }
}