<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Lsp\Contracts\Server\DriverInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class PublishServerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(DriverInterface::class)) {
            return;
        }

        $container->getDefinition(DriverInterface::class)
            ->setPublic(true);
    }
}
