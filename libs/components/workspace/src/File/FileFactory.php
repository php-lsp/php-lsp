<?php

declare(strict_types=1);

namespace Lsp\Workspace\File;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderFactoryInterface;
use Lsp\Workspace\Uri\UriFactory;
use Lsp\Workspace\Uri\UriFactoryInterface;

final readonly class FileFactory implements FileFactoryInterface
{
    public function __construct(
        private UriFactoryInterface $uri = new UriFactory(),
    ) {}

    public function create(
        string $uri,
        FilesystemReaderFactoryInterface $filesystems,
    ): VirtualFile {
        $uriValueObject = $this->uri->create($uri);

        return new VirtualFile(
            uri: $uriValueObject,
            filesystem: $filesystems->create($uriValueObject),
        );
    }
}
