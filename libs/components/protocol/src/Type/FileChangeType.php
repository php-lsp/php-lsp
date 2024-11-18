<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The file event type.
 */
enum FileChangeType: int
{
    /**
     * The file got created.
     */
    case Created = 1;
    /**
     * The file got changed.
     */
    case Changed = 2;
    /**
     * The file got deleted.
     */
    case Deleted = 3;
}
