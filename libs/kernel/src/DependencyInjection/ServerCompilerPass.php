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
use Lsp\Server\Driver\DriverInterface;
use Lsp\Server\Manager;
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
        $this->registerCommonServices($container);

        if ($this->supportsReactDriver()) {
            $this->registerReactDriver($container);
        }
    }

    private function registerCommonServices(ContainerBuilder $container): void
    {
        $container->register(HostFactoryInterface::class)
            ->setClass(HostFactory::class);

        $container->register(AddressFactoryInterface::class)
            ->setClass(AddressFactory::class);

        $container->register(ManagerInterface::class)
            ->setClass(Manager::class)
            ->setArgument('$driver', new Reference(DriverInterface::class))
            ->setArgument('$encoder', new Reference(EncoderInterface::class))
            ->setArgument('$decoder', new Reference(DecoderInterface::class))
            ->setArgument('$dispatcher', new Reference(DispatcherInterface::class))
            ->setArgument('$events', new Reference(EventDispatcherInterface::class))
        ;
    }

    private function supportsReactDriver(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/server-react');
    }

    private function registerReactDriver(ContainerBuilder $container): void
    {
        $container->register(LoopInterface::class)
            ->setFactory([Loop::class, 'get']);

        $container->register(DriverInterface::class)
            ->setClass(ReactDriver::class)
            ->setArgument('$loop', new Reference(LoopInterface::class))
            ->setArgument('$addresses', new Reference(AddressFactoryInterface::class));
    }
}
