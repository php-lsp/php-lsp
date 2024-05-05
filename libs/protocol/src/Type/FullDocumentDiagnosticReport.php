<?php

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report with a full set of problems.
 *
 * @generated
 * @since 3.17.0
 */
class FullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @param list<Diagnostic> $items
     */
    function __construct(string $kind, string $resultId, array $items)
    {
            $this->kind = $kind;
    
            $this->resultId = $resultId;
    
            $this->items = $items;
    }
}