<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A full document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class WorkspaceFullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @param full $kind a full document diagnostic report
     * @param string|null $resultId An optional result id. If provided it will
     *        be sent on the next diagnostic request for the same document.
     * @param list<Diagnostic> $items the actual items
     */
    public function __construct(
        /**
         * The URI for which diagnostic information is reported.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        string $kind,
        /**
         * The version number for which the diagnostics are reported.
         * If the document is not marked as open `null` can be provided.
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
        ?string $resultId = null,
        array $items = [],
    ) {
        $this->kind = $kind;
        $this->resultId = $resultId;
        $this->items = $items;
    }
}
