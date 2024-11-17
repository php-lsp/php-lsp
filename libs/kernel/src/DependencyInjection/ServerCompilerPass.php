<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Address\AddressFactory;
use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Address\Host\HostFactory;
use Lsp\Server\Address\Host\HostFactoryInterface;
use Lsp\Server\React\ReactServerConfiguration;
use Lsp\Server\React\ReactServerPool;
use Lsp\Server\ServerPoolInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Reference;

final class ServerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerCommonServices($container);

        if ($this->supportsReactServer()) {
            $this->registerReactServer($container);
        }
    }

    private function registerCommonServices(ContainerBuilder $container): void
    {
        $container->register(HostFactoryInterface::class)
            ->setClass(HostFactory::class);

        $container->register(AddressFactoryInterface::class)
            ->setClass(AddressFactory::class);
    }

    private function supportsReactServer(): bool
    {
        return \class_exists(ReactServerPool::class);
    }

    private function registerReactServer(ContainerBuilder $container): void
    {
        $container->register(LoopInterface::class)
            ->setFactory([Loop::class, 'get']);

        $container->register(ReactServerConfiguration::class)
            ->setArgument('$loop', new Reference(LoopInterface::class))
            ->setArgument('$decoder', new Reference(DecoderInterface::class))
            ->setArgument('$encoder', new Reference(EncoderInterface::class))
            ->setArgument('$dispatcher', new Reference(DispatcherInterface::class))
            ->setArgument('$events', new Reference(EventDispatcherInterface::class))
            ->setArgument('$addresses', new Reference(AddressFactoryInterface::class));

        $container->register(ServerPoolInterface::class)
            ->setClass(ReactServerPool::class)
            ->setArgument('$config', new Reference(ReactServerConfiguration::class))
            ->setArgument('$logger', new Reference(
                id: LoggerInterface::class,
                invalidBehavior: ContainerInterface::NULL_ON_INVALID_REFERENCE,
            ))
        ;
    }
}
