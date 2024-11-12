<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection\Router;

use Lsp\Router\Builder\AttributeCollector;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class RouteLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($container->hasDefinition(AttributeCollector::class)) {
            $this->registerAttributeCollectorRoutes($container);
        }
    }

    private function registerAttributeCollectorRoutes(ContainerBuilder $container): void
    {
        $collector = $container->getDefinition(AttributeCollector::class);

        foreach ($container->findTaggedServiceIds('lsp.controller') as $id => $tags) {
            $definition = $container->getDefinition($id);

            $definition->setPublic(true);
        }

        foreach ($container->findTaggedServiceIds('lsp.controller.lazy') as $id => $tags) {
            $collector->addMethodCall('addController', [
                $container->getDefinition($id)
                    ->getClass(),
            ]);
        }

        $collector->addMethodCall('addControllers', [
            new TaggedIteratorArgument('lsp.controller.instance'),
        ]);
    }
}
