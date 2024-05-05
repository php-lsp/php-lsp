<?php

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report indicating that the last returned
 * report is still accurate.
 *
 * @generated
 * @since 3.17.0
 */
class UnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    function __construct(string $kind, string $resultId)
    {
            $this->kind = $kind;
    
            $this->resultId = $resultId;
    }
}