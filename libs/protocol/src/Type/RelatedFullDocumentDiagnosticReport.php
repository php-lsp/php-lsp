<?php

namespace Lsp\Protocol\Type;

/**
 * A full diagnostic report with a set of related documents.
 *
 * @generated
 * @since 3.17.0
 */
final class RelatedFullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @param array<non-empty-string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport>|null $relatedDocuments
     * @param list<Diagnostic> $items
     */
    final public function __construct(
        string $kind,
        array $items,
        public readonly array|null $relatedDocuments = null,
        string|null $resultId = null,
    ) {
            $this->kind = $kind;
    
            $this->resultId = $resultId;
    
            $this->items = $items;
    }
}