<?php

declare(strict_types=1);

namespace Lsp\Workspace\Project;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderFactory;
use Lsp\Workspace\File\FilesystemReader\FilesystemReaderFactoryInterface;
use Lsp\Workspace\Uri\UriFactory;
use Lsp\Workspace\Uri\UriFactoryInterface;

final readonly class ProjectFactory implements ProjectFactoryInterface
{
    public function __construct(
        private UriFactoryInterface $uri = new UriFactory(),
        private FilesystemReaderFactoryInterface $filesystems = new FilesystemReaderFactory(),
    ) {}

    public function create(string $uri, string $name): ProjectInterface
    {
        $uriValueObject = $this->uri->create($uri);
        $filesystem = $this->filesystems->create($uriValueObject);

        return new Project(
            name: $name,
            uri: $uriValueObject,
            filesystem: $filesystem,
        );
    }
}
