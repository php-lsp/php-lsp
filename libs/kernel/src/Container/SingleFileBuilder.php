<?php

declare(strict_types=1);

namespace Lsp\Kernel\Container;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

final class SingleFileBuilder extends Builder
{
    public function __construct(
        private readonly bool $debug,
        private readonly string $environment,
        private readonly string $buildDirectory,
    ) {}

    public function build(callable $then): Container
    {
        $pathname = $this->getContainerPathname(
            class: $class = $this->getContainerClass(),
        );

        if ($this->shouldBeCompiled($pathname)) {
            // Prepare directory
            if (!@\mkdir($directory = \dirname($pathname), recursive: true)
                && !\is_dir($directory)) {
                throw new \RuntimeException(\sprintf('Directory "%s" was not created', $directory));
            }

            $result = $this->compile($class, $then);

            \file_put_contents($pathname, $result);
        }

        require_once $pathname;

        // @phpstan-ignore-next-line
        return new $class();
    }

    private function compile(string $class, callable $then): string
    {
        $builder = new ContainerBuilder();

        $then($builder);

        $builder->compile(true);

        $dumper = new PhpDumper($builder);

        /** @var string */
        return $dumper->dump([
            'class' => $class,
        ]);
    }

    private function shouldBeCompiled(string $pathname): bool
    {
        return $this->debug || !\is_file($pathname);
    }

    /**
     * @param non-empty-string $class
     * @return non-empty-string
     */
    private function getContainerPathname(string $class): string
    {
        return \vsprintf('%s/%s.php', [
            $this->buildDirectory,
            $class,
        ]);
    }

    /**
     * @return non-empty-string
     */
    private function getContainerClassSuffix(): string
    {
        return 'AppContainer';
    }

    /**
     * @return non-empty-string
     */
    private function getContainerClass(): string
    {
        /** @var class-string<Container> */
        return \ucfirst($this->environment) .
            $this->getContainerClassSuffix();
    }
}
