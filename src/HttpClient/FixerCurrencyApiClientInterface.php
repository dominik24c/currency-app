<?php

namespace App\HttpClient;

interface FixerCurrencyApiClientInterface
{
    public function getCurrencies(): array;
}