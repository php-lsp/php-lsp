<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\File\VirtualFileInterface;

/**
 * @template-implements \IteratorAggregate<array-key, VirtualFileInterface>
 */
final class InMemoryFilesystemReader implements
    FilesystemReaderInterface,
    \IteratorAggregate
{
    /**
     * @var list<VirtualFileInterface>|null
     */
    private ?array $memory = null;

    public function __construct(
        private readonly FilesystemReaderInterface $delegate,
    ) {}

    public function refresh(): void
    {
        $this->memory = null;
    }

    /**
     * @return \ArrayIterator<array-key, VirtualFileInterface>
     */
    public function getIterator(): \ArrayIterator
    {
        $this->memory ??= \iterator_to_array($this->delegate, false);

        return new \ArrayIterator($this->memory);
    }

    public function count(): int
    {
        $iterator = $this->getIterator();

        return $iterator->count();
    }
}
