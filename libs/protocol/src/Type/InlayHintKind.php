<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint kinds.
 *
 * @since 3.17.0
 */
enum InlayHintKind: int
{
    /**
     * An inlay hint that for a type annotation.
     *
     * @var int<0, 2147483647>
     */
    case Type = 1;
    /**
     * An inlay hint that is for a parameter.
     *
     * @var int<0, 2147483647>
     */
    case Parameter = 2;
}
