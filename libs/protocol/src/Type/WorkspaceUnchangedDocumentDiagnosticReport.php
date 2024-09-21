<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An unchanged document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class WorkspaceUnchangedDocumentDiagnosticReport
{
    use UnchangedDocumentDiagnosticReportMixin;

    /**
     * @param "unchanged" $kind A document diagnostic report indicating no
     *        changes to the last result. A server can only return `unchanged` if
     *        result ids are provided.
     * @param string $resultId a result id which will be sent on the next
     *        diagnostic request for the same document
     */
    public function __construct(
        /**
         * The URI for which diagnostic information is reported.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        string $kind,
        string $resultId,
        /**
         * The version number for which the diagnostics are reported.
         * If the document is not marked as open `null` can be provided.
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
    ) {
        $this->kind = $kind;
        $this->resultId = $resultId;
    }
}
