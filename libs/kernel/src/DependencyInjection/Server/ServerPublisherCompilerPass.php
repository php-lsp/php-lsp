<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection\Server;

use Lsp\Contracts\Server\ManagerInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ServerPublisherCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $container->getDefinition(ManagerInterface::class)
            ->setPublic(true);
    }
}
