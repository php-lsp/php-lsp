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
     * @generated
     * @since 3.17.0
     * @param array<non-empty-string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport> $relatedDocuments
     */
    final public function __construct(
        public readonly array $relatedDocuments,
        string $kind,
        string $resultId,
        array $items,
    ) {
        $this->kind = $kind;

        $this->resultId = $resultId;

        $this->items = $items;
    }
}
