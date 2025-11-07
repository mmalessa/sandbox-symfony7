<?php

declare(strict_types=1);

namespace App\UI\Http;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Ping
{
    #[Route('/ping', name: 'ping', methods: ['GET'])]
    public function ping(): Response
    {
        return new JsonResponse([
            "response" => "pong"
        ]);
    }
}
