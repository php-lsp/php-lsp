<?php

namespace Lsp\Protocol\Type;

trait FullDocumentDiagnosticReportMixin
{
    /**
     * A full document diagnostic report.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $kind;

    /**
     * An optional result id. If provided it will
     * be sent on the next diagnostic request for the
     * same document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $resultId;

    /**
     * The actual items.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var list<Diagnostic>
     */
    public readonly array $items;
}
