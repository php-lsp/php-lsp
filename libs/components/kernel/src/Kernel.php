<?php

declare(strict_types=1);

namespace Lsp\Kernel;

use Lsp\Kernel\DependencyInjection\EventDispatcher\EventListenerLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\EventDispatcherCompilerPass;
use Lsp\Kernel\DependencyInjection\LoggerCompilerPass;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException;
use Symfony\Component\Config\Exception\LoaderLoadException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;

/**
 * @phpstan-consistent-constructor
 */
class Kernel implements KernelInterface
{
    /**
     * @var non-empty-string
     */
    public const DEFAULT_ENV = 'prod';

    /**
     * @var bool
     */
    public const DEFAULT_DEBUG = false;

    public readonly Container $container;

    /**
     * @param non-empty-string $env
     * @param non-empty-string|null $root
     *
     * @throws \Exception
     */
    public function __construct(
        private readonly string $env = self::DEFAULT_ENV,
        private readonly bool $debug = self::DEFAULT_DEBUG,
        private readonly ?string $root = null,
    ) {
        $this->container = $this->createOrGetContainer();

        $this->bootContainer($this->container);
    }

    /**
     * @api
     *
     * @param non-empty-string|null $root
     *
     * @throws \Exception
     */
    public static function dev(?string $root = null): static
    {
        return new static('dev', true, $root);
    }

    /**
     * @api
     *
     * @param non-empty-string|null $root
     *
     * @throws \Exception
     */
    public static function prod(?string $root = null): static
    {
        return new static('prod', true, $root);
    }

    /**
     * @return non-empty-string
     */
    public function getEnvironment(): string
    {
        return $this->env;
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @return non-empty-string
     */
    protected function getProjectDirectory(): string
    {
        if ($this->root !== null) {
            return $this->root;
        }

        if (self::class !== static::class) {
            $directory = \getcwd();

            if ($directory === false) {
                return '.';
            }

            return $directory;
        }

        $pathname = (new \ReflectionClass(static::class))
            ->getFileName();

        /** @var non-empty-string */
        return \dirname((string) $pathname, 2);
    }

    /**
     * @return non-empty-string
     */
    protected function getConfigDirectory(): string
    {
        return $this->getProjectDirectory() . '/config';
    }

    /**
     * @return non-empty-string
     */
    protected function getCacheDirectory(): string
    {
        return $this->getProjectDirectory() . '/var/' . $this->getEnvironment();
    }

    /**
     * @return non-empty-string
     */
    protected function getBuildDirectory(): string
    {
        return $this->getCacheDirectory();
    }

    /**
     * @return non-empty-string
     */
    protected function getLogsDirectory(): string
    {
        return $this->getProjectDirectory() . '/var/logs';
    }

    /**
     * @return array<non-empty-string>
     */
    protected function getConfigDirectories(): array
    {
        $directory = $this->getConfigDirectory();

        if (!\is_dir($directory)) {
            return [];
        }

        return [$directory];
    }

    /**
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    private function createOrGetContainer(): Container
    {
        $class = $this->getContainerClass();
        $pathname = $this->getContainerPathname($class);

        if ($this->isDebug() || !\is_file($pathname)) {
            $dumper = new PhpDumper($this->createContainer());

            if (!@\mkdir($directory = \dirname($pathname), recursive: true)
                && !\is_dir($directory)) {
                throw new \RuntimeException(\sprintf('Directory "%s" was not created', $directory));
            }

            /** @var string $result */
            $result = $dumper->dump(['class' => $class]);

            \file_put_contents($pathname, $result);
        }

        require_once $pathname;

        // @phpstan-ignore-next-line
        return new $class();
    }

    /**
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    private function createContainer(): ContainerBuilder
    {
        $builder = new ContainerBuilder();

        $this->build($builder);

        $this->buildDefaultParameters($builder);
        $this->buildDefaultConfigs($builder);

        $builder->compile(true);

        return $builder;
    }

    private function buildDefaultParameters(ContainerBuilder $builder): void
    {
        $builder->setParameter('kernel.secret', '%env(string:default::APP_SECRET)%');
        $builder->setParameter('kernel.environment', $this->getEnvironment());
        $builder->setParameter('kernel.debug', $this->isDebug());
        $builder->setParameter('kernel.charset', 'UTF-8');
        $builder->setParameter('kernel.default_locale', 'en');
        $builder->setParameter('kernel.container_build_time', \time());
        $builder->setParameter('kernel.container_class', $this->getContainerClass());
        $builder->setParameter('kernel.project_dir', $this->getProjectDirectory());
        $builder->setParameter('kernel.build_dir', $this->getBuildDirectory());
        $builder->setParameter('kernel.cache_dir', $this->getCacheDirectory());
        $builder->setParameter('kernel.logs_dir', $this->getLogsDirectory());
    }

    /**
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    private function buildDefaultConfigs(ContainerBuilder $builder): void
    {
        $loader = new YamlFileLoader($builder, new FileLocator(
            $this->getConfigDirectories(),
        ), $this->getEnvironment());

        foreach ($this->getConfigDirectories() as $directory) {
            $loader->import($directory . '/*.yaml');
        }
    }

    protected function build(ContainerBuilder $container): void
    {
        // Kernel
        $container->register(KernelInterface::class)
            ->setSynthetic(true);

        $container->setAlias(self::class, KernelInterface::class);
        $container->setAlias(static::class, KernelInterface::class);

        // Builtin Components
        $container->addCompilerPass(new EventDispatcherCompilerPass(), priority: 1000);
        $container->addCompilerPass(new LoggerCompilerPass(), priority: 1000);
        $container->addCompilerPass(new EventListenerLoaderCompilerPass(), priority: 1000);

        $container->addCompilerPass(new RegisterListenersPass(), priority: -1000);
    }

    private function bootContainer(Container $container): void
    {
        $container->set(KernelInterface::class, $this);
        $container->set(ContainerInterface::class, $this->container);
    }

    /**
     * @param non-empty-string $class
     *
     * @return non-empty-string
     */
    private function getContainerPathname(string $class): string
    {
        return \vsprintf('%s/%s.php', [
            $this->getBuildDirectory(),
            $class,
        ]);
    }

    /**
     * @return non-empty-string
     */
    protected function getContainerClassSuffix(): string
    {
        return 'ServerContainer';
    }

    /**
     * @return class-string<Container>
     * @return non-empty-string
     */
    private function getContainerClass(): string
    {
        /** @var class-string<Container> */
        return \ucfirst($this->getEnvironment())
            . $this->getContainerClassSuffix();
    }
}
