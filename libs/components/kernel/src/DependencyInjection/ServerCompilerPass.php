<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Server\ManagerInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Address\AddressFactory;
use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Address\Host\HostFactory;
use Lsp\Server\Address\Host\HostFactoryInterface;
use Lsp\Server\Bridge\React\ReactDriver;
use Lsp\Server\ConnectionProviderInterface;
use Lsp\Server\ConnectionStore;
use Lsp\Server\Driver\DriverInterface;
use Lsp\Server\Driver\LoggableDriver;
use Lsp\Server\Manager;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class ServerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerCommonServices($container);

        if (!$container->has(DriverInterface::class)) {
            $this->registerBridge($container);
        }

        if ($container->getParameter('kernel.debug') === true) {
            $container->register(LoggableDriver::class, LoggableDriver::class)
                ->setDecoratedService(DriverInterface::class)
                ->setArgument('$logger', new Reference(LoggerInterface::class))
                ->setArgument('$delegate', new Reference('.inner'));
        }
    }

    private function registerCommonServices(ContainerBuilder $container): void
    {
        if (!$container->has(HostFactoryInterface::class)) {
            $container->register(HostFactoryInterface::class, HostFactory::class);
        }

        if (!$container->has(AddressFactoryInterface::class)) {
            $container->register(AddressFactoryInterface::class, AddressFactory::class);
        }

        $container->register(ConnectionStore::class, ConnectionStore::class);
        $container->setAlias(ConnectionProviderInterface::class, ConnectionStore::class);

        $container->register(ManagerInterface::class, Manager::class)
            ->setArgument('$driver', new Reference(DriverInterface::class))
            ->setArgument('$encoder', new Reference(EncoderInterface::class))
            ->setArgument('$decoder', new Reference(DecoderInterface::class))
            ->setArgument('$dispatcher', new Reference(DispatcherInterface::class))
            ->setArgument('$events', new Reference(EventDispatcherInterface::class))
            ->setArgument('$store', new Reference(ConnectionProviderInterface::class));
    }

    private function registerBridge(ContainerBuilder $container): void
    {
        if ($this->supportsReactBridge()) {
            $this->registerReactBridge($container);
        }
    }

    private function supportsReactBridge(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/bridge-server-react');
    }

    private function registerReactBridge(ContainerBuilder $container): void
    {
        $container->register(LoopInterface::class, LoopInterface::class)
            ->setFactory([Loop::class, 'get']);

        $container->register(DriverInterface::class, ReactDriver::class)
            ->setArgument('$loop', new Reference(LoopInterface::class))
            ->setArgument('$addresses', new Reference(AddressFactoryInterface::class));
    }
}
