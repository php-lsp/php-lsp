<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An unchanged diagnostic report with a set of related documents.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class RelatedUnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @param unchanged $kind A document diagnostic report indicating no changes
     *        to the last result. A server can only return `unchanged` if result ids
     *        are provided.
     * @param string $resultId a result id which will be sent on the next
     *        diagnostic request for the same document
     */
    public function __construct(
        string $kind,
        string $resultId,
        /**
         * Diagnostics of related documents. This information is useful in
         * programming languages where code in a file A can generate diagnostics
         * in a file B which A depends on. An example of such a language is
         * C/C++ where marco definitions in a file a.cpp and result in errors in
         * a header file b.hpp.
         *
         * @since 3.17.0
         *
         * @var list<non-empty-string,
         *      FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport>|null
         */
        public readonly ?array $relatedDocuments = null,
    ) {
        $this->kind = $kind;
        $this->resultId = $resultId;
    }
}
