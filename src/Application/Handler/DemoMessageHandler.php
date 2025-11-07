<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Message\DemoMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\Service\ResetInterface;

#[AsMessageHandler]
class DemoMessageHandler implements ResetInterface
{
    public function __invoke(DemoMessage $message)
    {
        print_r($message);
    }

    public function reset()
    {
        echo "## Handler reset ##\n";
    }
}
