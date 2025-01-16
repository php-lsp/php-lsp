<?php

declare(strict_types=1);

namespace Lsp\Workspace\File;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderFactoryInterface;

interface FileFactoryInterface
{
    /**
     * @param non-empty-string $uri
     */
    public function create(
        string $uri,
        FilesystemReaderFactoryInterface $filesystems,
    ): VirtualFileInterface;
}
