<?php

namespace Lsp\Protocol\Type;

/**
 * A full document diagnostic report for a workspace diagnostic result.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class WorkspaceFullDocumentDiagnosticReport
{
    use FullDocumentDiagnosticReportMixin;

    /**
     * @param non-empty-string $uri
     * @param int<-2147483648, 2147483647>|null $version
     * @param list<Diagnostic> $items
     */
    final public function __construct(
        public readonly string $uri,
        public readonly ?int $version,
        string $kind,
        string $resultId,
        array $items,
    ) {
        $this->kind = $kind;

        $this->resultId = $resultId;

        $this->items = $items;
    }
}
