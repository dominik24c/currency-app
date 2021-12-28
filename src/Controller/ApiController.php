<?php

namespace App\Controller;

use App\HttpClient\FixerCurrencyApiClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    private FixerCurrencyApiClientInterface $client;

    public function __construct(FixerCurrencyApiClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/currencies', name: 'list')]
    public function list(Request $request): Response
    {
        $base_currency = $request->query->get('base_currency');
        $data = $this->client->getCurrencies($base_currency);
        return $this->json($data);
    }


}
