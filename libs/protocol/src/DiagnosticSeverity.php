<?php

namespace Lsp\Protocol;

/**
 * The diagnostic's severity.
 */
enum DiagnosticSeverity: int
{
    /**
     * Reports an error.
     */
    case Error = 1;

    /**
     * Reports a warning.
     */
    case Warning = 2;

    /**
     * Reports an information.
     */
    case Information = 3;

    /**
     * Reports a hint.
     */
    case Hint = 4;
}