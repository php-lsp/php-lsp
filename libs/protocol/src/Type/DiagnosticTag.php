<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The diagnostic tags.
 *
 * @since 3.15.0
 *
 * @generated 2024-11-14
 */
enum DiagnosticTag: int
{
    /**
     * Unused or unnecessary code.
     *
     * Clients are allowed to render diagnostics with this tag faded out instead
     * of having an error squiggle.
     *
     * @var int<0, 2147483647>
     */
    case Unnecessary = 1;
    /**
     * Deprecated or obsolete code.
     *
     * Clients are allowed to rendered diagnostics with this tag strike through.
     *
     * @var int<0, 2147483647>
     */
    case Deprecated = 2;
}
