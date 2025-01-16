<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\Uri\Uri;

interface FilesystemReaderFactoryInterface
{
    /**
     * Create file system reader from given {@see Uri}.
     */
    public function create(Uri $uri): FilesystemReaderInterface;
}
