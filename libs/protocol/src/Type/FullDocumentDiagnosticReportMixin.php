<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report with a full set of problems.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
trait FullDocumentDiagnosticReportMixin
{
    /**
     * A full document diagnostic report.
     */
    public readonly string $kind;
    /**
     * An optional result id. If provided it will be sent on the next diagnostic
     * request for the same document.
     *
     * @readonly
     */
    public ?string $resultId = null;
    /**
     * The actual items.
     *
     * @var list<Diagnostic>
     *
     * @readonly
     */
    public array $items = [];
}
