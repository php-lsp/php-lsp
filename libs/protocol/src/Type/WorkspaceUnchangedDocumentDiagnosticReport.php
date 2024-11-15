<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An unchanged document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class WorkspaceUnchangedDocumentDiagnosticReport
{
    public function __construct(
        /**
         * The URI for which diagnostic information is reported.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * A document diagnostic report indicating no changes to the last
         * result. A server can only return `unchanged` if result ids are
         * provided.
         */
        public readonly string $kind,
        /**
         * A result id which will be sent on the next diagnostic request for the
         * same document.
         */
        public readonly string $resultId,
        /**
         * The version number for which the diagnostics are reported.
         * If the document is not marked as open `null` can be provided.
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
    ) {}
}
