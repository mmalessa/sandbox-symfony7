<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony;

use Symfony\Contracts\Service\ResetInterface;

class MagicResetLever implements ResetInterface
{
    public function reset(): void
    {
        echo "############### BIG RESET LEVER ################\n";
    }
}
