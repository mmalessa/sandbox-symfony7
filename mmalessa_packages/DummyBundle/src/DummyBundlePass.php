<?php

declare(strict_types=1);

namespace Mmalessa\DummyBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DummyBundlePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void {
        $dummySomething = $container->findTaggedServiceIds('mmalessa.dummy_something');
        foreach ($dummySomething as $id => $tags) {
            printf("DummySomething class name: %s\n", $id);
        }
    }
}
