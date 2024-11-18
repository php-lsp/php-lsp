<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A diagnostic report with a full set of problems.
 *
 * @since 3.17.0
 */
final class FullDocumentDiagnosticReport
{
    public function __construct(
        /**
         * A full document diagnostic report.
         */
        public readonly string $kind,
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
