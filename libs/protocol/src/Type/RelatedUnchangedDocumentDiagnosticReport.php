<?php

namespace Lsp\Protocol\Type;

/**
 * An unchanged diagnostic report with a set of related documents.
 *
 * @generated
 * @since 3.17.0
 */
final class RelatedUnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @param array<non-empty-string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport> $relatedDocuments
     */
    final public function __construct(
        public readonly array $relatedDocuments,
        string $kind,
        string $resultId,
    ) {
            $this->kind = $kind;
    
            $this->resultId = $resultId;
    }
}