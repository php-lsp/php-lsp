<?php

namespace Lsp\Protocol\Type;

/**
 * The diagnostic tags.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.15.0
 */
enum DiagnosticTag: int
{
    /**
     * Unused or unnecessary code.
     *
     * Clients are allowed to render diagnostics with this tag faded out instead of having
     * an error squiggle.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Unnecessary = 1;

    /**
     * Deprecated or obsolete code.
     *
     * Clients are allowed to rendered diagnostics with this tag strike through.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Deprecated = 2;
}
