<?php

namespace Lsp\Protocol\Type;

trait FullDocumentDiagnosticReportMixin
{
    /**
     * A full document diagnostic report.
     *
     * @generated
     */
    public readonly string $kind;

    /**
     * An optional result id. If provided it will
     * be sent on the next diagnostic request for the
     * same document.
     *
     * @generated
     */
    public readonly string $resultId;

    /**
     * The actual items.
     *
     * @generated
     *
     * @var list<Diagnostic>
     */
    public readonly array $items;
}
