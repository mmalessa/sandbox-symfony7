<?php

declare(strict_types=1);

namespace App\Message;

use Mmalessa\DummyBundle\DummySomething\AsDummySomething;

#[AsDummySomething]
class MessageOne
{
    public function __construct(
        private readonly string $message,
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
