<?php

namespace Lsp\Protocol\Type;

/**
 * A partial result for a workspace diagnostic report.
 *
 * @generated
 * @since 3.17.0
 */
final class WorkspaceDiagnosticReportPartialResult
{
    /**
     * @param list<WorkspaceFullDocumentDiagnosticReport|WorkspaceUnchangedDocumentDiagnosticReport> $items
     */
    final public function __construct(
        public readonly array $items,
    ) {}
}