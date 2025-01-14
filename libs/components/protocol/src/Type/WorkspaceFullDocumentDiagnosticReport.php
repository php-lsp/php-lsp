<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A full document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 */
final class WorkspaceFullDocumentDiagnosticReport
{
    public function __construct(
        /**
         * The URI for which diagnostic information is reported.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * A full document diagnostic report.
         *
         * @var "full"
         */
        public readonly string $kind,
        /**
         * The version number for which the diagnostics are reported.
         * If the document is not marked as open `null` can be provided.
         *
         * @var int<-2147483648, 2147483647>|null
         */
        public readonly ?int $version = null,
        /**
         * An optional result id. If provided it will be sent on the next
         * diagnostic request for the same document.
         */
        public readonly ?string $resultId = null,
        /**
         * The actual items.
         *
         * @var list<Diagnostic>
         */
        public readonly array $items = [],
    ) {}
}
