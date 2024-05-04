<?php

namespace Lsp\Protocol\Type;

/**
 * A full diagnostic report with a set of related documents.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class RelatedFullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
