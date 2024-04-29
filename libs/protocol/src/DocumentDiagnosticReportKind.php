<?php

namespace Lsp\Protocol;

/**
 * The document diagnostic report kinds.
 *
 * @since 3.17.0
 */
enum DocumentDiagnosticReportKind: string
{
    /**
     * A diagnostic report with a full
     * set of problems.
     */
    case Full = 'full';

    /**
     * A report indicating that the last
     * returned report is still accurate.
     */
    case Unchanged = 'unchanged';
}