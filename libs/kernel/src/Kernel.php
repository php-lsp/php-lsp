<?php

declare(strict_types=1);

namespace Lsp\Kernel;

use Dotenv\Dotenv;
use Lsp\Kernel\DependencyInjection\CodecCompilerPass;
use Lsp\Kernel\DependencyInjection\DispatcherCompilerPass;
use Lsp\Kernel\DependencyInjection\MessageFactoryCompilerPass;
use Lsp\Kernel\DependencyInjection\RouteLoaderCompilerPass;
use Lsp\Kernel\DependencyInjection\RouterCompilerPass;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException;
use Symfony\Component\Config\Exception\LoaderLoadException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

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
     *
     * @throws \Exception
     */
    public function __construct(
        public readonly string $env = self::DEFAULT_ENV,
        public readonly bool $debug = self::DEFAULT_DEBUG,
    ) {
        $this->container = $this->getCachedContainer(
            pathname: \vsprintf('%s/%s.php', [
                $this->getBuildDirectory(),
                $this->getContainerClass(),
            ]),
            class: $this->getContainerClass(),
        );

        $this->extendContainerDefinitions($this->container);
    }

    /**
     * @psalm-taint-sink file $directory
     * @param non-empty-string $directory
     * @param list<non-empty-string> $names
     *
     * @return class-string<static>
     */
    public static function dotenv(?string $directory = null, array $names = ['.env', '.env.example']): string
    {
        $isLoadable = false;
        $directory ??= (string) \getcwd();

        foreach ($names as $name) {
            if (\is_file($directory . '/' . $name)) {
                $isLoadable = true;
                break;
            }
        }

        if ($isLoadable) {
            $dotenv = Dotenv::createImmutable($directory, $names);
            $dotenv->load();
        }

        return static::class;
    }

    public static function dev(): static
    {
        return new static('dev', true);
    }

    public static function prod(): static
    {
        return new static('prod', true);
    }

    /**
     * @return non-empty-string
     */
    protected function getEnvironment(): string
    {
        return $this->env;
    }

    protected function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @return non-empty-string
     */
    protected function getProjectDirectory(): string
    {
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
     * @param non-empty-string $pathname
     * @param class-string<Container> $class
     *
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    private function getCachedContainer(string $pathname, string $class): Container
    {
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

        return new $class();
    }

    /**
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    private function createContainer(): ContainerBuilder
    {
        $builder = new ContainerBuilder();

        $this->extendContainerBuilderParameters($builder);
        $this->extendContainerBuilderDefinitions($builder);
        $this->extendContainerBuilderConfigs($builder);

        foreach ($this->getExtensions() as $extension) {
            $builder->registerExtension($extension);
        }

        $this->build($builder);

        $builder->compile(true);

        return $builder;
    }

    protected function extendContainerBuilderParameters(ContainerBuilder $builder): void
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

    protected function extendContainerBuilderDefinitions(ContainerBuilder $builder): void
    {
        // Kernel
        $builder->setDefinition(KernelInterface::class, (new Definition(KernelInterface::class))
            ->setSynthetic(true));

        $builder->setAlias(self::class, KernelInterface::class);
        $builder->setAlias(static::class, KernelInterface::class);

        // Container
        $builder->setDefinition(ContainerInterface::class, (new Definition(ContainerInterface::class))
            ->setSynthetic(true));
        $builder->setAlias(SymfonyContainerInterface::class, ContainerInterface::class);
    }

    protected function extendContainerDefinitions(Container $container): void
    {
        $container->set(KernelInterface::class, $this);
        $container->set(ContainerInterface::class, $this->container);
    }

    /**
     * @throws FileLoaderImportCircularReferenceException
     * @throws LoaderLoadException
     */
    protected function extendContainerBuilderConfigs(ContainerBuilder $builder): void
    {
        $loader = new YamlFileLoader($builder, new FileLocator(
            $this->getConfigDirectories(),
        ), $this->getEnvironment());

        foreach ($this->getConfigDirectories() as $directory) {
            $loader->import($directory . '/*.yaml');
            $loader->import($directory . '/*/*.yaml');
        }
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
     * @return iterable<array-key, ExtensionInterface>
     */
    protected function getExtensions(): iterable
    {
        return [];
    }

    protected function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new MessageFactoryCompilerPass(), priority: 1000);
        $container->addCompilerPass(new CodecCompilerPass(), priority: 1000);
        $container->addCompilerPass(new RouterCompilerPass(), priority: 1000);
        $container->addCompilerPass(new DispatcherCompilerPass(), priority: 1000);

        $container->addCompilerPass(new RouteLoaderCompilerPass());
    }

    /**
     * @return class-string<Container>
     */
    protected function getContainerClass(): string
    {
        /** @var class-string<Container> */
        return \ucfirst($this->getEnvironment()) . 'AppContainer';
    }
}
