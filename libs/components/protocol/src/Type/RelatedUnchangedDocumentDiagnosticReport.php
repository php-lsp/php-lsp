<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An unchanged diagnostic report with a set of related documents.
 *
 * @since 3.17.0
 */
final class RelatedUnchangedDocumentDiagnosticReport
{
    public function __construct(
        /**
         * A document diagnostic report indicating no changes to the last
         * result. A server can only return `unchanged` if result ids are
         * provided.
         *
         * @var "unchanged"
         */
        public readonly string $kind,
        /**
         * A result id which will be sent on the next diagnostic request for the
         * same document.
         */
        public readonly string $resultId,
        /**
         * Diagnostics of related documents. This information is useful in
         * programming languages where code in a file A can generate diagnostics
         * in a file B which A depends on. An example of such a language is
         * C/C++ where marco definitions in a file a.cpp and result in errors in
         * a header file b.hpp.
         *
         * @since 3.17.0
         *
         * @var array<non-empty-string, (FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport)>|null
         */
        public readonly ?array $relatedDocuments = null,
    ) {}
}
