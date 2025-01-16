<?php

declare(strict_types=1);

namespace Lsp\Workspace\File;

use Lsp\Workspace\File\FilesystemReader\FilesystemReaderFactoryInterface;

final class InMemoryFileFactory implements FileFactoryInterface
{
    /**
     * @var int<1, max>
     */
    private const int DEFAULT_GC = 25;

    /**
     * @var array<non-empty-string, \WeakReference<VirtualFileInterface>>
     */
    private array $memory = [];

    public function __construct(
        private readonly FileFactoryInterface $delegate = new FileFactory(),
        /**
         * @var int<1, max>
         */
        private readonly int $gc = self::DEFAULT_GC,
    ) {}

    public function create(
        string $uri,
        FilesystemReaderFactoryInterface $filesystems,
    ): VirtualFileInterface {
        $reference = $this->memory[$uri] ?? null;

        if ($reference === null) {
            $this->memory[$uri] = \WeakReference::create(
                object: $file = $this->delegate->create($uri, $filesystems),
            );

            return $file;
        }

        $file = $reference->get();

        if ($file === null) {
            $this->memory[$uri]  = \WeakReference::create(
                object: $file = $this->delegate->create($uri, $filesystems),
            );
        }

        try {
            return $file;
        } finally {
            $this->tryCollect();
        }
    }

    private function tryCollect(): void
    {
        /** @var int<0, max> $execution */
        static $execution = 0;

        if (++$execution % $this->gc !== 0) {
            return;
        }

        $this->collect();
        $execution = 0;
    }

    private function collect(): void
    {
        foreach ($this->memory as $uri => $reference) {
            $file = $reference->get();

            if ($file === null) {
                unset($this->memory[$uri]);
            }
        }
    }

    public function prune(): void
    {
        $this->memory = [];
    }
}
