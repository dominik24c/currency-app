<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testApiGetCurrencies(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/currencies');

        $this->assertResponseIsSuccessful();

        $data = json_decode($client->getResponse()->getContent(), true);

        $this->assertIsArray($data);
        $this->assertArrayHasKey('currencies',$data);
        $this->assertArrayHasKey('base_currency',$data);
        $this->assertSame("EUR",$data['base_currency']);
        $this->assertSame(2.4,$data['currencies']["AUD"]);
        $this->assertSame(4.9,$data['currencies']["PLN"]);
    }
}
