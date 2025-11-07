<?php

declare(strict_types=1);

namespace App\Application\Message;

class DemoMessage
{
    public function __construct(
        public readonly string $body,
        public readonly array  $headers
    ) {}
}
