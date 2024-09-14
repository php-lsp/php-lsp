<?php

namespace Lsp\Protocol\Type;

/**
 * The document diagnostic report kinds.
 *
 * @generated
 *
 * @since 3.17.0
 */
enum DocumentDiagnosticReportKind: string
{
    /**
     * A diagnostic report with a full
     * set of problems.
     *
     * @generated
     */
    case Full = 'full';

    /**
     * A report indicating that the last
     * returned report is still accurate.
     *
     * @generated
     */
    case Unchanged = 'unchanged';
}
