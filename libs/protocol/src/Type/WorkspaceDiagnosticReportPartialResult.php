<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A partial result for a workspace diagnostic report.
 *
 * @since 3.17.0
 */
final class WorkspaceDiagnosticReportPartialResult
{
    public function __construct(
        /**
         * @var list<WorkspaceFullDocumentDiagnosticReport|WorkspaceUnchangedDocumentDiagnosticReport>
         */
        public readonly array $items = [],
    ) {}
}
