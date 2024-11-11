<?php

declare(strict_types=1);

namespace Lsp\Kernel;

use Psr\Container\ContainerInterface;
use Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException;
use Symfony\Component\Config\Exception\LoaderLoadException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
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
     * @param non-empty-string|null $projectDirectory
     *
     * @throws \Exception
     */
    public function __construct(
        private readonly string $env = self::DEFAULT_ENV,
        private readonly bool $debug = self::DEFAULT_DEBUG,
        private readonly ?string $projectDirectory = null,
    ) {
        $this->container = $this->createOrGetContainer();

        $this->bootContainer($this->container);
    }

    /**
     * @api
     * @param non-empty-string|null $projectDirectory
     * @throws \Exception
     */
    public static function dev(string $projectDirectory = null): static
    {
        return new static('dev', true, $projectDirectory);
    }

    /**
     * @api
     * @param non-empty-string|null $projectDirectory
     * @throws \Exception
     */
    public static function prod(string $projectDirectory = null): static
    {
        return new static('prod', true, $projectDirectory);
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
        if ($this->projectDirectory !== null) {
            return $this->projectDirectory;
        }

        if (self::class !== static::class) {
            return \getcwd() ?: '.';
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
        return $this->getProjectDirectory() . '/build/' . $this->getEnvironment() . '/var';
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

        $this->buildDefaultParameters($builder);
        $this->buildDefaultConfigs($builder);
        $this->build($builder);

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
            $loader->import($directory . '/*/*.yaml');
        }
    }

    protected function build(ContainerBuilder $container): void
    {
        // Kernel
        $container->register(KernelInterface::class)
            ->setSynthetic(true);

        $container->setAlias(self::class, KernelInterface::class);
        $container->setAlias(static::class, KernelInterface::class);

        // Container
        $container->register(ContainerInterface::class)
            ->setSynthetic(true);

        $container->setAlias(SymfonyContainerInterface::class, ContainerInterface::class);
    }

    private function bootContainer(Container $container): void
    {
        $container->set(KernelInterface::class, $this);
        $container->set(ContainerInterface::class, $this->container);
    }

    /**
     * @param non-empty-string $class
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
        return 'Container';
    }

    /**
     * @return class-string<Container>
     * @return non-empty-string
     */
    private function getContainerClass(): string
    {
        $offset = \strrpos(static::class, '\\');
        $offset = $offset === false ? 0 : $offset + 1;

        /** @var class-string<Container> */
        return \ucfirst($this->getEnvironment())
            . \substr(static::class, $offset)
            . $this->getContainerClassSuffix();
    }
}
