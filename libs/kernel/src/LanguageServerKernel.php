<?php

declare(strict_types=1);

namespace Lsp\Kernel;

use Lsp\Contracts\Server\DriverInterface;
use Lsp\Kernel\DependencyInjection\CodecCompilerPass;
use Lsp\Kernel\DependencyInjection\DispatcherCompilerPass;
use Lsp\Kernel\DependencyInjection\DispatcherLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\MessageFactoryCompilerPass;
use Lsp\Kernel\DependencyInjection\PublishServerCompilerPass;
use Lsp\Kernel\DependencyInjection\RouteLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\RouterCompilerPass;
use Lsp\Kernel\DependencyInjection\ServerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @phpstan-consistent-constructor
 */
class LanguageServerKernel extends Kernel implements ServerKernelInterface
{
    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new MessageFactoryCompilerPass(), priority: 1000);
        $container->addCompilerPass(new CodecCompilerPass(), priority: 1000);
        $container->addCompilerPass(new RouterCompilerPass(), priority: 1000);
        $container->addCompilerPass(new DispatcherCompilerPass(), priority: 1000);
        $container->addCompilerPass(new ServerCompilerPass(), priority: 1000);

        $container->addCompilerPass(new PublishServerCompilerPass(), priority: -1000);
        $container->addCompilerPass(new RouteLoaderCompilerPass(), priority: -1000);
        $container->addCompilerPass(new DispatcherLoaderCompilerPass(), priority: -1000);
    }

    public function run(int $port = 0, string $host = '127.0.0.1'): void
    {
        $driver = $this->container->get(DriverInterface::class);

        if (!$driver instanceof DriverInterface) {
            throw new \LogicException('Could not fetch server driver instance from container');
        }

        $driver->create('tcp://' . $host . ':' . $port);
        $driver->run();
    }
}
