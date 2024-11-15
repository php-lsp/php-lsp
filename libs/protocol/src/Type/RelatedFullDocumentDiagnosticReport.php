<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A full diagnostic report with a set of related documents.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class RelatedFullDocumentDiagnosticReport
{
    public function __construct(
        /**
         * A full document diagnostic report.
         */
        public readonly string $kind,
        /**
         * Diagnostics of related documents. This information is useful in
         * programming languages where code in a file A can generate diagnostics
         * in a file B which A depends on. An example of such a language is
         * C/C++ where marco definitions in a file a.cpp and result in errors in
         * a header file b.hpp.
         *
         * @since 3.17.0
         *
         * @var list<non-empty-string, (FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport)>|null
         */
        public readonly ?array $relatedDocuments = null,
        /**
         * An optional result id. If provided it will be sent on the next
         * diagnostic request for the same document.
         */
        public readonly ?string $resultId = null,
        /**
         * The actual items.
         *
         * @var list<Diagnostic>
         */
        public readonly array $items = [],
    ) {}
}
