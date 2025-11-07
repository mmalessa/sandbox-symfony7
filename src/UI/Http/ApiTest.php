<?php

declare(strict_types=1);

namespace App\UI\Http;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
class ApiTest
{
    #[Route('/test', name: 'api-test', methods: ['GET'])]
    public function apiTest()
    {
        return new JsonResponse([
            'result' => 'ok',
        ]);
    }
}
