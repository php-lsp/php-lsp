<?php

declare(strict_types=1);

namespace Lsp\Workspace\File;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderInterface;
use Lsp\Workspace\Uri\Uri;

/**
 * @template-implements \IteratorAggregate<array-key, VirtualFileInterface>
 */
final class VirtualFile implements
    VirtualFileInterface,
    \IteratorAggregate
{
    public string $name {
        get => \basename($this->uri->path);
    }

    public string $path {
        get => \str_replace('\\', '/', $this->uri->path);
    }

    public ?string $extension {
        get {
            $extension = \pathinfo($this->uri->path, \PATHINFO_EXTENSION);

            return $extension === '' ? null : $extension;
        }
    }

    public ?string $nameWithoutExtension {
        get {
            $name = \pathinfo($this->uri->path, \PATHINFO_FILENAME);

            return $name === '' ? null : $name;
        }
    }

    public function __construct(
        public readonly Uri $uri,
        private readonly FilesystemReaderInterface $filesystem,
    ) {}

    public function refresh(): void
    {
        $this->filesystem->refresh();
    }

    public function getIterator(): \Traversable
    {
        return $this->filesystem;
    }

    public function count(): int
    {
        return $this->filesystem->count();
    }

    public function __toString(): string
    {
        return (string) $this->uri;
    }
}
