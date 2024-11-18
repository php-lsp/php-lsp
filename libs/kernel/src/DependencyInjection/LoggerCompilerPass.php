<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class LoggerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($container->has(LoggerInterface::class)) {
            return;
        }

        $container->register(LoggerInterface::class, NullLogger::class);
    }
}
