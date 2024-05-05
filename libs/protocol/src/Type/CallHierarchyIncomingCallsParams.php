<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `callHierarchy/incomingCalls` request.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyIncomingCallsParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    final public function __construct(
        public readonly CallHierarchyItem $item,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
