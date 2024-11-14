<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Lsp\Contracts\Hydrator\ExtractorInterface;
use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Hydrator\JMS\Builder;
use Lsp\Hydrator\JMS\Extractor;
use Lsp\Hydrator\JMS\Hydrator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

final class HydratorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($this->supportsJmsHydrator()) {
            $this->registerJmsHydrator($container);
        }
    }

    private function supportsJmsHydrator(): bool
    {
        return \class_exists(Hydrator::class)
            && \class_exists(Extractor::class);
    }

    private function registerJmsHydrator(ContainerBuilder $container): void
    {
        $container->register(Builder::class)
            ->setArgument('$debug', new Parameter('kernel.debug'));

        $container->register(HydratorInterface::class)
            ->setPublic(true) # debug only
            ->setFactory([new Reference(Builder::class), 'getHydrator']);

        $container->register(ExtractorInterface::class)
            ->setFactory([new Reference(Builder::class), 'getExtractor']);
    }
}
