<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint kinds.
 *
 * @generated
 *
 * @since 3.17.0
 */
enum InlayHintKind: int
{
    /**
     * An inlay hint that for a type annotation.
     *
     * @generated
     */
    case Type = 1;

    /**
     * An inlay hint that is for a parameter.
     *
     * @generated
     */
    case Parameter = 2;
}
