<?php

declare(strict_types=1);

namespace App\Infrastructure\Report;

class DummyReport
{
    private readonly string $instanceId;
    public function __construct(
        private string $title,
        private string $factoryInstanceId
    )
    {
        $this->instanceId = uniqid();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getInstanceId(): string
    {
        return $this->instanceId;
    }

    public function getFactoryInstanceId(): string
    {
        return $this->factoryInstanceId;
    }
}
