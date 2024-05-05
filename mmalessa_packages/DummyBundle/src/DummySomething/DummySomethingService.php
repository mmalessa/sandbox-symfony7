<?php

declare(strict_types=1);

namespace Mmalessa\DummyBundle\DummySomething;

class DummySomethingService
{
    private array $messages = [];

    public function __construct(private readonly string $messageRootNamespace)
    {
    }

    public function register(string $messageClassName): void
    {
        if (!str_starts_with($messageClassName, $this->messageRootNamespace)) {
            return;
        }
        $this->messages[] = $messageClassName;
    }
}
