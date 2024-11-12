<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Server\DriverInterface;
use Lsp\Server\React\ReactDriver;
use Psr\EventDispatcher\EventDispatcherInterface;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ServerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($this->supportsReactServer()) {
            $this->registerReactServer($container);
        }
    }

    private function supportsReactServer(): bool
    {
        return \class_exists(ReactDriver::class);
    }

    private function registerReactServer(ContainerBuilder $container): void
    {
        $container->register(LoopInterface::class)
            ->setFactory([Loop::class, 'get']);

        $container->register(DriverInterface::class)
            ->setClass(ReactDriver::class)
            ->setArgument('$loop', new Reference(LoopInterface::class))
            ->setArgument('$decoder', new Reference(DecoderInterface::class))
            ->setArgument('$encoder', new Reference(EncoderInterface::class))
            ->setArgument('$dispatcher', new Reference(DispatcherInterface::class))
            ->setArgument('$events', new Reference(EventDispatcherInterface::class))
        ;
    }
}
