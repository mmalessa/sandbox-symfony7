<?php

declare(strict_types=1);

namespace Mmalessa\DummyBundle;

use Mmalessa\DummyBundle\DummySomething\AsDummySomething;
use Mmalessa\DummyBundle\DummySomething\AsDummySomethingService;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DummyBundle extends AbstractBundle
{
    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builder->registerAttributeForAutoconfiguration(
            AsDummySomething::class,
            function (ChildDefinition $definition) {
                $definition->addTag('mmalessa.dummy_something');
            }
        );
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new DummyBundlePass());
    }
}
