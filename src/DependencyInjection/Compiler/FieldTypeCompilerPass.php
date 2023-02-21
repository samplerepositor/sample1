<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Component\Storage\FieldTypeProvider;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FieldTypeCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(FieldTypeProvider::class)) {
            return;
        }

        $definition = $container->findDefinition(FieldTypeProvider::class);
        $taggedServices = $container->findTaggedServiceIds('app.field_type');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('add', [new Reference($id)]);
        }
    }
}
