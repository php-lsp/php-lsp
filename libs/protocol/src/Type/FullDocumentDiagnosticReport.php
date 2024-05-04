<?php

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report with a full set of problems.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
class FullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param list<Diagnostic> $items
     */
    public function __construct(string $kind, string $resultId, array $items)
    {
        $this->kind = $kind;

        $this->resultId = $resultId;

        $this->items = $items;
    }
}
