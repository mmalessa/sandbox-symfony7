<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Message\DemoMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\Service\ResetInterface;

#[AsMessageHandler]
class DemoMessageHandler implements ResetInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function __invoke(DemoMessage $message)
    {
        $this->logger->info('Demo message received');
        print_r($message);
    }

    public function reset()
    {
        $this->logger->info('Handler reset');
    }
}
