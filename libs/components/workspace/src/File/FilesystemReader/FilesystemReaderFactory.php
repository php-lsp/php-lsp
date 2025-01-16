<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\File\FileFactory;
use Lsp\Workspace\File\FileFactoryInterface;
use Lsp\Workspace\Uri\Uri;

final readonly class FilesystemReaderFactory implements FilesystemReaderFactoryInterface
{
    /**
     * @var \WeakMap<Uri, FilesystemReaderInterface>
     */
    private \WeakMap $identityMap;

    public function __construct(
        private FileFactoryInterface $files = new FileFactory(),
    ) {
        $this->identityMap = new \WeakMap();
    }

    private function createNewInstance(Uri $uri): FilesystemReaderInterface
    {
        return match ($uri->type) {
            'file' => new LocalFilesystemReader($uri->path, $this->files, $this),
            default => new EmptyFilesystemReader(),
        };
    }

    public function create(Uri $uri): FilesystemReaderInterface
    {
        // @phpstan-ignore-next-line : PHPStan false-positive
        return $this->identityMap[$uri] ??= new InMemoryFilesystemReader(
            delegate: $this->createNewInstance($uri),
        );
    }
}
