<?php

namespace Lsp\Protocol\Type;

/**
 * An unchanged document diagnostic report for a workspace diagnostic result.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class WorkspaceUnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param non-empty-string $uri
     * @param int<-2147483648, 2147483647>|null $version
     */
    final public function __construct(
        public readonly string $uri,
        public readonly int|null $version,
        string $kind,
        string $resultId,
    ) {
        $this->kind = $kind;

        $this->resultId = $resultId;
    }
}
