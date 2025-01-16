<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\File\VirtualFileInterface;

/**
 * @template-implements \IteratorAggregate<array-key, VirtualFileInterface>
 */
final class EmptyFilesystemReader implements
    FilesystemReaderInterface,
    \IteratorAggregate
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function refresh(): void
    {
        // NOOP: This driver does not require synchronization
    }

    public function getIterator(): \EmptyIterator
    {
        return new \EmptyIterator();
    }

    public function count(): int
    {
        return 0;
    }
}
