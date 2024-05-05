<?php

namespace Lsp\Protocol\Type;

/**
 * A workspace diagnostic report.
 *
 * @generated
 * @since 3.17.0
 */
final class WorkspaceDiagnosticReport
{
    /**
     * @generated
     * @since 3.17.0
     * @param list<WorkspaceFullDocumentDiagnosticReport|WorkspaceUnchangedDocumentDiagnosticReport> $items
     */
    final public function __construct(
        public readonly array $items,
    ) {}
}
