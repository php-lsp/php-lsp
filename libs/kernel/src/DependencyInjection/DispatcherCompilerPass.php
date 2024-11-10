<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Dispatcher\Dispatcher;
use Lsp\Dispatcher\Resolver\CallableHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassStaticMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\ContainerAwareClassMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\FunctionHandlerResolver;
use Lsp\Dispatcher\Resolver\HandlerResolverInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class DispatcherCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!self::isPackageInstalled()) {
            return;
        }

        $this->registerDispatcher($container);

        $this->registerAutoconfiguredInterfaces($container);
        $this->registerHandlerResolvers($container);
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
            ->addArgument(new TaggedIteratorArgument('lsp.dispatcher.handler_resolver'));
    }

    private function registerAutoconfiguredInterfaces(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(HandlerResolverInterface::class)
            ->addTag('lsp.dispatcher.handler_resolver');
    }

    private function registerHandlerResolvers(ContainerBuilder $container): void
    {
        $container->register(ClassStaticMethodHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(CallableHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(FunctionHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(ContainerAwareClassMethodHandlerResolver::class)
            ->addArgument(new Reference(ContainerInterface::class))
            ->addArgument(true)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(ClassMethodHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');
    }
}
