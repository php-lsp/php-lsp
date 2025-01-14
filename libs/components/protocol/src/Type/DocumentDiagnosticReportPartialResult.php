<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A partial result for a document diagnostic report.
 *
 * @since 3.17.0
 */
final class DocumentDiagnosticReportPartialResult
{
    public function __construct(
        /**
         * @var array<non-empty-string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport>
         */
        public readonly array $relatedDocuments = [],
    ) {}
}
