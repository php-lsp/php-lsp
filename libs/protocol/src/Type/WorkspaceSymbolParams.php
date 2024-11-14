<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-11-14
 */
final class WorkspaceSymbolParams
{
    use WorkDoneProgressParamsMixin;
    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken An
     *        optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
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
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
