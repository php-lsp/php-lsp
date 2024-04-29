<?php

namespace Lsp\Protocol;

/**
 * Inlay hint kinds.
 *
 * @since 3.17.0
 */
enum InlayHintKind: int
{
    /**
     * An inlay hint that for a type annotation.
     */
    case Type = 1;

    /**
     * An inlay hint that is for a parameter.
     */
    case Parameter = 2;
}