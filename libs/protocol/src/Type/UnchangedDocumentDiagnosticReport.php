<?php

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report indicating that the last returned
 * report is still accurate.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
class UnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    public function __construct(string $kind, string $resultId)
    {
        $this->kind = $kind;

        $this->resultId = $resultId;
    }
}
