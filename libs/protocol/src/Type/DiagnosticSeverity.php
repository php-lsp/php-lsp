<?php

namespace Lsp\Protocol\Type;

/**
 * The diagnostic's severity.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum DiagnosticSeverity: int
{
    /**
     * Reports an error.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Error = 1;

    /**
     * Reports a warning.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Warning = 2;

    /**
     * Reports an information.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Information = 3;

    /**
     * Reports a hint.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Hint = 4;
}
