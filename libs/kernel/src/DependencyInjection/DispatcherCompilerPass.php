<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Dispatcher\Dispatcher;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Router\RouterInterface;
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
}
