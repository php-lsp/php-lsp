<?php

declare(strict_types=1);

namespace Lsp\Workspace\Project;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderInterface;
use Lsp\Workspace\File\VirtualFileInterface;
use Lsp\Workspace\Uri\Uri;

/**
 * @template-implements \IteratorAggregate<array-key, VirtualFileInterface>
 */
class Project implements ProjectInterface, \IteratorAggregate
{
    public string $path {
        get => \str_replace('\\', '/', $this->uri->path);
    }

    public function __construct(
        public readonly string $name,
        public readonly Uri $uri,
        private readonly FilesystemReaderInterface $filesystem,
    ) {}

    public function getIterator(): \Traversable
    {
        return $this->filesystem;
    }

    public function count(): int
    {
        return $this->filesystem->count();
    }
}
