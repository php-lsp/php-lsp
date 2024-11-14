<?php

declare(strict_types=1);

namespace Lsp\Kernel;

use Lsp\Kernel\DependencyInjection\CodecCompilerPass;
use Lsp\Kernel\DependencyInjection\Dispatcher\DispatcherLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\DispatcherCompilerPass;
use Lsp\Kernel\DependencyInjection\HydratorCompilerPass;
use Lsp\Kernel\DependencyInjection\MessageFactoryCompilerPass;
use Lsp\Kernel\DependencyInjection\Router\RouteLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\RouterCompilerPass;
use Lsp\Kernel\DependencyInjection\Server\ServerPublisherCompilerPass;
use Lsp\Kernel\DependencyInjection\ServerCompilerPass;
use Lsp\Server\ServerPoolInterface;
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
        {
            $container->addCompilerPass(new RouterCompilerPass(), priority: 1000);
            $container->addCompilerPass(new RouteLoaderCompilerPass(), priority: -1000);
        }
        {
            $container->addCompilerPass(new DispatcherCompilerPass(), priority: 1000);
            $container->addCompilerPass(new DispatcherLoaderCompilerPass(), priority: -1000);
        }
        {
            $container->addCompilerPass(new ServerCompilerPass(), priority: 1000);
            $container->addCompilerPass(new ServerPublisherCompilerPass(), priority: -1000);
        }
        $container->addCompilerPass(new HydratorCompilerPass(), priority: 1000);
    }

    public function listen(string $dsn): void
    {
        $pool = $this->container->get(ServerPoolInterface::class);

        if (!$pool instanceof ServerPoolInterface) {
            throw new \LogicException('Could not fetch server pool instance from container');
        }

        $pool->listen($dsn);
    }
}
