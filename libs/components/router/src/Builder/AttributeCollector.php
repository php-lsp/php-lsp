<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Contracts\Router\RouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Router\Builder\AttributeCollector\AttributeReader;
use Lsp\Router\Handler\ClassMethodHandler;
use Lsp\Router\Handler\ClassStaticMethodHandler;
use Lsp\Router\Handler\InstanceMethodHandler;

/**
 * @template-implements \IteratorAggregate<array-key, RouteInterface>
 */
final class AttributeCollector implements BuilderInterface, \IteratorAggregate
{
    private readonly RouteCollector $collector;
    private readonly AttributeReader $reader;

    public function __construct()
    {
        $this->collector = new RouteCollector();
        $this->reader = new AttributeReader();
    }

    /**
     * @api
     *
     * @param class-string|object $controller
     *
     * @throws \ReflectionException
     */
    public function addController(string|object $controller): self
    {
        if (\is_object($controller)) {
            return $this->addControllerInstance($controller);
        }

        return $this->addControllerClass($controller);
    }

    /**
     * @api
     *
     * @param iterable<mixed, class-string|object> $controllers
     *
     * @throws \ReflectionException
     */
    public function addControllers(iterable $controllers): self
    {
        foreach ($controllers as $controller) {
            $this->addController($controller);
        }

        return $this;
    }

    private function addControllerInstance(object $controller): self
    {
        $object = new \ReflectionObject($controller);

        foreach ($this->reader->getAllMethods($object) as $action => $method) {
            $this->collector->add($action, match ($method->isStatic()) {
                true => new ClassStaticMethodHandler(
                    class: $object->getName(),
                    method: $method->getName(),
                ),
                default => new InstanceMethodHandler(
                    object: $controller,
                    method: $method->getName(),
                ),
            });
        }

        return $this;
    }

    /**
     * @param class-string $controller
     *
     * @throws \ReflectionException
     */
    private function addControllerClass(string $controller): self
    {
        $class = new \ReflectionClass($controller);

        foreach ($this->reader->getAllMethods($class) as $action => $method) {
            $this->collector->add($action, match ($method->isStatic()) {
                true => new ClassStaticMethodHandler(
                    class: $class->getName(),
                    method: $method->getName(),
                ),
                default => new ClassMethodHandler(
                    class: $class->getName(),
                    method: $method->getName(),
                ),
            });
        }

        return $this;
    }

    public function build(): RouterInterface
    {
        return $this->collector->build();
    }

    public function getIterator(): \Traversable
    {
        yield from $this->collector;
    }

    public function count(): int
    {
        return $this->collector->count();
    }
}
