<?php

namespace Lsp\Protocol\Type;

/**
 * Inlay hint kinds.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
enum InlayHintKind: int
{
    /**
     * An inlay hint that for a type annotation.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Type = 1;

    /**
     * An inlay hint that is for a parameter.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Parameter = 2;
}
