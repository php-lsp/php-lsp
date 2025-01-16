<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\File\FileFactoryInterface;
use Lsp\Workspace\File\VirtualFileInterface;
use Lsp\Workspace\Uri\Uri;

/**
 * @template-implements \IteratorAggregate<array-key, VirtualFileInterface>
 */
final readonly class LocalFilesystemReader implements
    FilesystemReaderInterface,
    \IteratorAggregate
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        private string $directory,
        private FileFactoryInterface $files,
        private FilesystemReaderFactoryInterface $filesystems,
    ) {}

    public function refresh(): void
    {
        // NOOP: This driver does not require synchronization
    }

    private function shouldSkip(\DirectoryIterator $info): bool
    {
        return $info->isDot();
    }

    public function getIterator(): \Traversable
    {
        if (\is_dir($this->directory) === false) {
            return new \EmptyIterator();
        }

        $iterator = new \DirectoryIterator($this->directory);

        foreach ($iterator as $info) {
            if ($this->shouldSkip($info)) {
                continue;
            }

            $pathname = $info->getPathname();

            if ($pathname === '') {
                continue;
            }

            yield $this->files->create(
                uri: (string) Uri::createLocal($pathname),
                filesystems: $this->filesystems,
            );
        }
    }

    public function count(): int
    {
        $counter = 0;

        if (\is_dir($this->directory) === false) {
            return $counter;
        }

        foreach (new \DirectoryIterator($this->directory) as $info) {
            if ($this->shouldSkip($info)) {
                continue;
            }

            ++$counter;
        }

        return $counter;
    }
}
