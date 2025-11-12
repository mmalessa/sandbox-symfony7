<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Service\ResetInterface;

class MagicResetLever implements ResetInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function boo(): void
    {}


    public function reset(): void
    {
        $this->logger->info("############### MAGIC RESET LEVER ################");
    }
}
