<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters of the workspace diagnostic request.
 *
 * @generated
 * @since 3.17.0
 */
final class WorkspaceDiagnosticParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param list<PreviousResultId> $previousResultIds
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly array $previousResultIds,
        public readonly string|null $identifier = null,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}