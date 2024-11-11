<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Dispatcher\Argument\Provider\ArgumentProviderInterface;
use Lsp\Dispatcher\Argument\Provider\OrderedArgumentProvider;
use Lsp\Dispatcher\Dispatcher;
use Lsp\Dispatcher\Handler\Provider\HandlerProviderInterface;
use Lsp\Dispatcher\Handler\Provider\OrderedHandlerProvider;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class DispatcherLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!self::isPackageInstalled()) {
            return;
        }

        $this->registerHandlerProviders($container);
        $this->registerArgumentProviders($container);

        $this->registerDispatcher($container);
    }

    private static function isPackageInstalled(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/dispatcher');
    }

    private function registerDispatcher(ContainerBuilder $container): void
    {
        $container->register(DispatcherInterface::class)
            ->setClass(Dispatcher::class)
            ->setPublic(true)
            ->addArgument(new Reference(RouterInterface::class))
            ->addArgument(new Reference(ResponseFactoryInterface::class))
            ->addArgument(new Reference(HandlerProviderInterface::class))
            ->addArgument(new Reference(ArgumentProviderInterface::class));
    }

    private function registerArgumentProviders(ContainerBuilder $container): void
    {
        $container->register(ArgumentProviderInterface::class)
            ->setPublic(true) // debug
            ->setClass(OrderedArgumentProvider::class)
            ->setArgument('$resolvers', new TaggedIteratorArgument('lsp.dispatcher.argument_resolver'));
    }

    private function registerHandlerProviders(ContainerBuilder $container): void
    {
        $container->register(HandlerProviderInterface::class)
            ->setClass(OrderedHandlerProvider::class)
            ->setArgument('$resolvers', new TaggedIteratorArgument('lsp.dispatcher.handler_resolver'));
    }
}
