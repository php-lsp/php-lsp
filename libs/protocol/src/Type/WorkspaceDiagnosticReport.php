<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A workspace diagnostic report.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class WorkspaceDiagnosticReport
{
    public function __construct(
        /**
         * @var list<WorkspaceFullDocumentDiagnosticReport|WorkspaceUnchangedDocumentDiagnosticReport>
         */
        public readonly array $items = [],
    ) {}
}
