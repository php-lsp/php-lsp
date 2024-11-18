<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Psr\EventDispatcher\EventDispatcherInterface as PsrEventDispatcherInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\ImmutableEventDispatcher;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface as ContractsEventDispatcherInterface;

final class EventDispatcherCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerEventDispatcher($container);
    }

    private function registerEventDispatcher(ContainerBuilder $container): void
    {
        if ($container->has(EventDispatcherInterface::class)) {
            return;
        }

        $container->register(EventDispatcher::class, EventDispatcher::class);
        $container->setAlias(EventDispatcherInterface::class, EventDispatcher::class);
        $container->setAlias('event_dispatcher', EventDispatcher::class);

        $container->register(ImmutableEventDispatcher::class, ImmutableEventDispatcher::class)
            ->setArgument('$dispatcher', new Reference(EventDispatcher::class));
        $container->setAlias(ContractsEventDispatcherInterface::class, ImmutableEventDispatcher::class);
        $container->setAlias(PsrEventDispatcherInterface::class, ImmutableEventDispatcher::class);
    }
}
