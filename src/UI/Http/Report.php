<?php

declare(strict_types=1);

namespace App\UI\Http;


use App\Infrastructure\Report\DummyReportFactory;
use App\Infrastructure\Report\DummyReportGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Report
{
    public function __construct(
        private readonly DummyReportFactory $dummyReportFactory,
        private readonly DummyReportGenerator $dummyReportGenerator
    )
    {}

    #[Route('/report', name: 'report', methods: ['GET'] )]
    public function default(): Response
    {
        $reportA = $this->dummyReportFactory->create('Report A');
        $reportB = $this->dummyReportFactory->create('Report B');
        $reportC = $this->dummyReportGenerator->generate('Report C');
        $reportD = $this->dummyReportGenerator->generate('Report D');

        $response = [
            'report A (direct)' => [
                'title' => $reportA->getTitle(),
                'instanceId' => $reportA->getInstanceId(),
                'factoryInstanceId' => $reportA->getFactoryInstanceId(),
            ],
            'report B (direct)' => [
                'title' => $reportB->getTitle(),
                'instanceId' => $reportB->getInstanceId(),
                'factoryInstanceId' => $reportB->getFactoryInstanceId(),
            ],
            'report C (factory)' => [
                'title' => $reportC->getTitle(),
                'instanceId' => $reportC->getInstanceId(),
                'factoryInstanceId' => $reportC->getFactoryInstanceId(),
            ],
            'report D (factory)' => [
                'title' => $reportD->getTitle(),
                'instanceId' => $reportD->getInstanceId(),
                'factoryInstanceId' => $reportD->getFactoryInstanceId(),
            ]
        ];

        return new JsonResponse($response);
    }
}
