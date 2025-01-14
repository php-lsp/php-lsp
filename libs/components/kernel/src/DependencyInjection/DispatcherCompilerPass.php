<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Hydrator\ExtractorInterface;
use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Dispatcher\Argument\Resolver\ArgumentResolverInterface;
use Lsp\Dispatcher\Argument\Resolver\ConnectionArgumentResolver;
use Lsp\Dispatcher\Argument\Resolver\MessageArgumentResolver;
use Lsp\Dispatcher\Argument\Resolver\MessageIdArgumentResolver;
use Lsp\Dispatcher\Argument\Resolver\ProtocolTypeArgumentResolver;
use Lsp\Dispatcher\Argument\Resolver\RouteArgumentResolver;
use Lsp\Dispatcher\Argument\Resolver\ServerArgumentResolver;
use Lsp\Dispatcher\Handler\Resolver\CallableHandlerResolver;
use Lsp\Dispatcher\Handler\Resolver\ClassMethodHandlerResolver;
use Lsp\Dispatcher\Handler\Resolver\ClassStaticMethodHandlerResolver;
use Lsp\Dispatcher\Handler\Resolver\ContainerAwareClassMethodHandlerResolver;
use Lsp\Dispatcher\Handler\Resolver\FunctionHandlerResolver;
use Lsp\Dispatcher\Handler\Resolver\HandlerResolverInterface;
use Lsp\Dispatcher\Result\Resolver\GenericResultResolver;
use Lsp\Dispatcher\Result\Resolver\ProtocolTypeResultResolver;
use Lsp\Dispatcher\Result\Resolver\ResultResolverInterface;
use Lsp\Server\ConnectionProviderInterface;
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

        $this->registerAutoconfiguredHandlerResolvers($container);
        $this->registerHandlerResolvers($container);

        $this->registerAutoconfiguredArgumentResolvers($container);
        $this->registerArgumentResolvers($container);

        $this->registerAutoconfiguredResultResolvers($container);
        $this->registerResultResolvers($container);
    }

    private static function isPackageInstalled(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/dispatcher');
    }

    private function registerAutoconfiguredArgumentResolvers(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(ArgumentResolverInterface::class)
            ->addTag('lsp.dispatcher.argument_resolver');
    }

    private function registerArgumentResolvers(ContainerBuilder $container): void
    {
        $container->register(RouteArgumentResolver::class, RouteArgumentResolver::class)
            ->addTag('lsp.dispatcher.argument_resolver');

        $container->register(MessageArgumentResolver::class, MessageArgumentResolver::class)
            ->addTag('lsp.dispatcher.argument_resolver');

        $container->register(MessageIdArgumentResolver::class, MessageIdArgumentResolver::class)
            ->addTag('lsp.dispatcher.argument_resolver');

        $container->register(ProtocolTypeArgumentResolver::class, ProtocolTypeArgumentResolver::class)
            ->setArgument('$hydrator', new Reference(HydratorInterface::class))
            ->addTag('lsp.dispatcher.argument_resolver');

        $container->register(ConnectionArgumentResolver::class, ConnectionArgumentResolver::class)
            ->setArgument('$provider', new Reference(ConnectionProviderInterface::class))
            ->addTag('lsp.dispatcher.argument_resolver');

        $container->register(ServerArgumentResolver::class, ServerArgumentResolver::class)
            ->setArgument('$provider', new Reference(ConnectionProviderInterface::class))
            ->addTag('lsp.dispatcher.argument_resolver');
    }

    private function registerAutoconfiguredHandlerResolvers(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(HandlerResolverInterface::class)
            ->addTag('lsp.dispatcher.handler_resolver');
    }

    private function registerHandlerResolvers(ContainerBuilder $container): void
    {
        $container->register(ClassStaticMethodHandlerResolver::class, ClassStaticMethodHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(CallableHandlerResolver::class, CallableHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(FunctionHandlerResolver::class, FunctionHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(
            id: ContainerAwareClassMethodHandlerResolver::class,
            class: ContainerAwareClassMethodHandlerResolver::class,
        )
            ->addArgument(new Reference('service_container'))
            ->addArgument(true)
            ->addTag('lsp.dispatcher.handler_resolver');

        $container->register(ClassMethodHandlerResolver::class, ClassMethodHandlerResolver::class)
            ->addTag('lsp.dispatcher.handler_resolver');
    }

    private function registerAutoconfiguredResultResolvers(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(ResultResolverInterface::class)
            ->addTag('lsp.dispatcher.result_resolver');
    }

    private function registerResultResolvers(ContainerBuilder $container): void
    {
        $container->register(ProtocolTypeResultResolver::class, ProtocolTypeResultResolver::class)
            ->setArgument('$extractor', new Reference(ExtractorInterface::class))
            ->addTag('lsp.dispatcher.result_resolver');

        $container->register(GenericResultResolver::class, GenericResultResolver::class)
            ->setArgument('$extractor', new Reference(ExtractorInterface::class))
            ->addTag('lsp.dispatcher.result_resolver', [
                // Using min priority
                'priority' => \PHP_INT_MIN,
            ]);
    }
}
