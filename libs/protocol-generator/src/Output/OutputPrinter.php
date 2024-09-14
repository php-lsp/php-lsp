<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output;

use Lsp\Protocol\Generator\Output\Printer\Per2Printer;
use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Stmt\ClassLike as PhpClassLikeStatement;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\FirstFindingVisitor;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\PrettyPrinter as PrettyPrinterInterface;

/**
 * @template-implements \IteratorAggregate<array-key, PhpNodeInterface>
 */
final class OutputPrinter implements \IteratorAggregate, \Countable
{
    /**
     * @param non-empty-string $namespace
     * @param \ArrayObject<array-key, PhpNodeInterface> $types
     */
    public function __construct(
        private readonly string $namespace,
        private readonly \ArrayObject $types,
        private PrettyPrinterInterface $printer = new Per2Printer(),
    ) {}

    /**
     * @api
     */
    public function withPrinter(PrettyPrinterInterface $printer): self
    {
        $self = clone $this;
        $self->printer = $printer;

        return $self;
    }

    private function getTypeVisitor(): FirstFindingVisitor
    {
        $callback = static fn(PhpNodeInterface $node): bool
            => $node instanceof PhpClassLikeStatement;

        return new FirstFindingVisitor($callback);
    }

    /**
     * @return non-empty-string
     */
    private function getFullQualifiedName(PhpNodeInterface $node): string
    {
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new NameResolver());
        $traverser->addVisitor($type = $this->getTypeVisitor());
        $traverser->traverse([$node]);

        $classLike = $type->getFoundNode();

        if (!$classLike instanceof PhpClassLikeStatement) {
            throw new \InvalidArgumentException('Could not find class like statement');
        }

        if ($classLike->namespacedName !== null) {
            /** @var non-empty-string */
            return $classLike->namespacedName->toString();
        }

        /** @var non-empty-string */
        return $classLike->name?->toString() ?? 'Unknown';
    }

    private function getFilename(PhpNodeInterface $node, string $namespace): string
    {
        $filename = $this->getFullQualifiedName($node);

        if (\str_starts_with($filename, $namespace . '\\')) {
            $filename = \substr($filename, \strlen($namespace) + 1);
        }

        return \str_replace('\\', '/', $filename) . '.php';
    }

    /**
     * @api
     *
     * @return iterable<array-key, PhpNodeInterface>
     */
    public function getAllTypes(): iterable
    {
        return $this->types;
    }

    /**
     * @api
     *
     * @return iterable<array-key, non-empty-string>
     */
    public function getAllSources(): iterable
    {
        foreach ($this->types as $type) {
            /** @var non-empty-string $result */
            $result = $this->printer->prettyPrintFile([$type]);

            yield $result;
        }
    }

    /**
     * @param non-empty-string $directory
     */
    public function save(string $directory): void
    {
        foreach ($this->types as $type) {
            $pathname = $directory . '/' . $this->getFilename($type, $this->namespace);

            if (!\is_dir(\dirname($pathname))) {
                \mkdir(\dirname($pathname), recursive: true);
            }

            $contents = $this->printer->prettyPrintFile([$type]);

            \file_put_contents($pathname, $contents, \LOCK_EX);
        }
    }

    public function getIterator(): \Traversable
    {
        yield from $this->types;
    }

    /**
     * @return int<0, max>
     */
    public function count(): int
    {
        return $this->types->count();
    }
}
