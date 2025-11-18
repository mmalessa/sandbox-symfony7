<?php

declare(strict_types=1);

namespace App\Infrastructure\Report;

class DummyReportFactory
{
    private readonly string $instanceId;

    public function __construct()
    {
        $this->instanceId = uniqid();
    }

    public function create(string $title): DummyReport
    {
        return new DummyReport($title, $this->instanceId);
    }
}
