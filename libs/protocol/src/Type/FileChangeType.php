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
     *
     * @var int<0, 2147483647>
     */
    case Created = 1;
    /**
     * The file got changed.
     *
     * @var int<0, 2147483647>
     */
    case Changed = 2;
    /**
     * The file got deleted.
     *
     * @var int<0, 2147483647>
     */
    case Deleted = 3;
}
