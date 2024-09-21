<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The document diagnostic report kinds.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
enum DocumentDiagnosticReportKind: string
{
    /**
     * A diagnostic report with a full set of problems.
     *
     * @var string
     */
    case Full = 'full';
    /**
     * A report indicating that the last returned report is still accurate.
     *
     * @var string
     */
    case Unchanged = 'unchanged';
}
