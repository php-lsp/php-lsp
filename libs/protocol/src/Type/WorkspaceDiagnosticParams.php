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
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    final public function __construct(
        public readonly string $identifier,
        public readonly array $previousResultIds,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
