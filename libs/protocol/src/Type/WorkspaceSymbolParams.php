<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link WorkspaceSymbolRequest}.
 *
 * @generated
 */
final class WorkspaceSymbolParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated
     */
    final public function __construct(
        public readonly string $query,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
