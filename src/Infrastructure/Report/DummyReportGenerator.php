<?php

declare(strict_types=1);

namespace App\Infrastructure\Report;

class DummyReportGenerator
{
    public function __construct(
        private readonly DummyReportFactory $dummyReportFactory)
    {}

    public function generate(string $title): DummyReport
    {
        return $this->dummyReportFactory->create($title);
    }
}
