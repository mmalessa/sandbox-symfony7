<?php

declare(strict_types=1);

namespace Mmalessa\DummyBundle\DummySomething;

#[\Attribute(\Attribute::TARGET_CLASS)]
class AsDummySomething
{
    public function __construct(
        public ?string $somethingId = null,
    ) {
    }
}
