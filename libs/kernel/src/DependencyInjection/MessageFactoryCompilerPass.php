<?php

declare(strict_types=1);

namespace Lsp\Kernel\DependencyInjection;

use Composer\InstalledVersions;
use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Rpc\Message\Factory\IdFactory;
use Lsp\Rpc\Message\Factory\IdFactory\GeneratorInterface;
use Lsp\Rpc\Message\Factory\IdFactory\Int32Generator;
use Lsp\Rpc\Message\Factory\IdFactory\Int64Generator;
use Lsp\Rpc\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;
use Lsp\Rpc\Message\Factory\RequestFactory;
use Lsp\Rpc\Message\Factory\ResponseFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

final class MessageFactoryCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!self::isPackageInstalled()) {
            return;
        }

        $this->registerDefaultParameters($container);
        $this->registerIdFactory($container);
        $this->registerIdGenerator($container);
        $this->registerRequestFactory($container);
        $this->registerResponseFactory($container);
    }

    private static function isPackageInstalled(): bool
    {
        return \class_exists(InstalledVersions::class)
            && InstalledVersions::isInstalled('php-lsp/rpc-message-factory');
    }

    private function registerDefaultParameters(ContainerBuilder $container): void
    {
        $container->setParameter(
            name: 'lsp.rpc.id_generator.overflow_behaviour',
            value: OverflowBehaviour::RESET,
        );
    }

    private function registerIdFactory(ContainerBuilder $container): void
    {
        $container->register(IdFactoryInterface::class)
            ->setClass(IdFactory::class);

        $container->setAlias('lsp.rpc.id_factory', IdFactoryInterface::class);
    }

    private function registerIdGenerator(ContainerBuilder $container): void
    {
        $container->register(GeneratorInterface::class)
            ->setClass($this->getPlatformDependentGeneratorClass())
            ->addArgument(new Reference(IdFactoryInterface::class))
            ->addArgument(new Parameter('lsp.rpc.id_generator.overflow_behaviour'))
            ->setAutowired(true);

        $container->setAlias('lsp.rpc.id_generator', GeneratorInterface::class);
    }

    /**
     * @return class-string<GeneratorInterface<mixed>>
     */
    private function getPlatformDependentGeneratorClass(): string
    {
        if (\PHP_INT_SIZE <= 4) {
            /** @var class-string<GeneratorInterface<mixed>> */
            return Int32Generator::class;
        }

        /** @var class-string<GeneratorInterface<mixed>> */
        return Int64Generator::class;
    }

    private function registerRequestFactory(ContainerBuilder $container): void
    {
        $container->register(RequestFactoryInterface::class)
            ->setClass(RequestFactory::class)
            ->addArgument(new Reference(GeneratorInterface::class))
            ->setAutowired(true);

        $container->setAlias('lsp.rpc.request_factory', RequestFactoryInterface::class);
    }

    private function registerResponseFactory(ContainerBuilder $container): void
    {
        $container->register(ResponseFactoryInterface::class)
            ->setClass(ResponseFactory::class)
            ->setAutowired(true);

        $container->setAlias('lsp.rpc.response_factory', ResponseFactoryInterface::class);
    }
}
