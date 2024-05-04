<?php

namespace Lsp\Protocol\Type;

trait UnchangedDocumentDiagnosticReportMixin
{
    /**
     * A document diagnostic report indicating
     * no changes to the last result. A server can
     * only return `unchanged` if result ids are
     * provided.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $kind;

    /**
     * A result id which will be sent on the next
     * diagnostic request for the same document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $resultId;
}
