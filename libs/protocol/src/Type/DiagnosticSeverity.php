<?php

namespace Lsp\Protocol\Type;

/**
 * The diagnostic's severity.
 *
 * @generated
 */
enum DiagnosticSeverity: int
{
    /**
     * Reports an error.
     *
     * @generated
     */
    case Error = 1;

    /**
     * Reports a warning.
     *
     * @generated
     */
    case Warning = 2;

    /**
     * Reports an information.
     *
     * @generated
     */
    case Information = 3;

    /**
     * Reports a hint.
     *
     * @generated
     */
    case Hint = 4;
}