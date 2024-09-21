<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report with a full set of problems.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class FullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @param full $kind a full document diagnostic report
     * @param string|null $resultId An optional result id. If provided it will
     *        be sent on the next diagnostic request for the same document.
     * @param list<Diagnostic> $items the actual items
     */
    public function __construct(string $kind, ?string $resultId = null, array $items = [])
    {
        $this->kind = $kind;
        $this->resultId = $resultId;
        $this->items = $items;
    }
}
