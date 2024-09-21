<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report indicating that the last returned report is still
 * accurate.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class UnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @param "unchanged" $kind A document diagnostic report indicating no
     *        changes to the last result. A server can only return `unchanged` if
     *        result ids are provided.
     * @param string $resultId a result id which will be sent on the next
     *        diagnostic request for the same document
     */
    public function __construct(string $kind, string $resultId)
    {
        $this->kind = $kind;
        $this->resultId = $resultId;
    }
}
