<?php

declare(strict_types=1);

namespace Lsp\Workspace\File\FilesystemReader;

use Lsp\Workspace\File\VirtualFileInterface;

/**
 * @template-extends \Traversable<array-key, VirtualFileInterface>
 */
interface FilesystemReaderInterface extends \Traversable, \Countable
{
    /**
     * Allows to force a virtual file system update if required.
     */
    public function refresh(): void;

    /**
     * Gets count of children elements.
     *
     * @return int<0, max>
     */
    public function count(): int;
}
