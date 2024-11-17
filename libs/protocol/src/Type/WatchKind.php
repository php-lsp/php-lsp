<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum WatchKind: int
{
    /**
     * Interested in create events.
     *
     * @var int<0, 2147483647>
     */
    case Create = 1;
    /**
     * Interested in change events.
     *
     * @var int<0, 2147483647>
     */
    case Change = 2;
    /**
     * Interested in delete events.
     *
     * @var int<0, 2147483647>
     */
    case Delete = 4;
}
