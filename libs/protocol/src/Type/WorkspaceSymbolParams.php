<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-11-15
 */
final class WorkspaceSymbolParams
{
    public function __construct(
        /**
         * A query string to filter symbols by. Clients may send an empty string
         * here to request all symbols.
         *
         * The `query`-parameter should be interpreted in a *relaxed way* as
         * editors will apply their own highlighting and scoring on the results.
         * A good rule of thumb is to match case-insensitive and to simply check
         * that the characters of *query* appear in their order in a candidate
         * symbol.
         * Servers shouldn't use prefix, substring, or similar strict matching.
         */
        public readonly string $query,
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
        /**
         * An optional token that a server can use to report partial results
         * (e.g. streaming) to the client.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $partialResultToken = null,
    ) {}
}
