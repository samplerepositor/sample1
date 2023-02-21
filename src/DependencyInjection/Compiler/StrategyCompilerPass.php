<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Component\Strategy\StrategyProvider;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class StrategyCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(StrategyProvider::class)) {
            return;
        }

        $definition = $container->findDefinition(StrategyProvider::class);
        $taggedServices = $container->findTaggedServiceIds('app.strategy');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('add', [new Reference($id)]);
        }
    }
}
