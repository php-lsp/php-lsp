<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection\Dispatcher;

use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Dispatcher\Argument\Provider\ArgumentProviderInterface;
use Lsp\Dispatcher\Argument\Provider\OrderedArgumentProvider;
use Lsp\Dispatcher\Dispatcher;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Dispatcher\Handler\Provider\HandlerProviderInterface;
use Lsp\Dispatcher\Handler\Provider\OrderedHandlerProvider;
use Lsp\Dispatcher\Result\Provider\OrderedResultProvider;
use Lsp\Dispatcher\Result\Provider\ResultProviderInterface;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class DispatcherLoaderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerHandlerProviders($container);
        $this->registerArgumentProviders($container);
        $this->registerResultProviders($container);

        $this->registerDispatcher($container);
    }

    private function registerHandlerProviders(ContainerBuilder $container): void
    {
        $container->register(HandlerProviderInterface::class)
            ->setClass(OrderedHandlerProvider::class)
            ->setArgument('$resolvers', new TaggedIteratorArgument('lsp.dispatcher.handler_resolver'));
    }

    private function registerArgumentProviders(ContainerBuilder $container): void
    {
        $container->register(ArgumentProviderInterface::class)
            ->setClass(OrderedArgumentProvider::class)
            ->setArgument('$resolvers', new TaggedIteratorArgument('lsp.dispatcher.argument_resolver'));
    }

    private function registerResultProviders(ContainerBuilder $container): void
    {
        $container->register(ResultProviderInterface::class)
            ->setClass(OrderedResultProvider::class)
            ->setArgument('$resolvers', new TaggedIteratorArgument('lsp.dispatcher.result_resolver'));
    }

    private function registerDispatcher(ContainerBuilder $container): void
    {
        $container->register(DispatcherInterface::class)
            ->setClass(Dispatcher::class)
            ->setArgument('$router', new Reference(RouterInterface::class))
            ->setArgument('$responses', new Reference(ResponseFactoryInterface::class))
            ->setArgument('$handlers', new Reference(HandlerProviderInterface::class))
            ->setArgument('$arguments', new Reference(ArgumentProviderInterface::class))
            ->setArgument('$results', new Reference(ResultProviderInterface::class))
        ;
    }
}
