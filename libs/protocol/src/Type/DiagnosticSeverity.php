<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The diagnostic's severity.
 */
enum DiagnosticSeverity: int
{
    /**
     * Reports an error.
     *
     * @var int<0, 2147483647>
     */
    case Error = 1;
    /**
     * Reports a warning.
     *
     * @var int<0, 2147483647>
     */
    case Warning = 2;
    /**
     * Reports an information.
     *
     * @var int<0, 2147483647>
     */
    case Information = 3;
    /**
     * Reports a hint.
     *
     * @var int<0, 2147483647>
     */
    case Hint = 4;
}
