<?php

namespace Lsp\Protocol\Type;

/**
 * The document diagnostic report kinds.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
enum DocumentDiagnosticReportKind: string
{
    /**
     * A diagnostic report with a full
     * set of problems.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Full = 'full';

    /**
     * A report indicating that the last
     * returned report is still accurate.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Unchanged = 'unchanged';
}
