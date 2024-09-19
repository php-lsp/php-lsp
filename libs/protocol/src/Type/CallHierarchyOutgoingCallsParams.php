<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `callHierarchy/outgoingCalls` request.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyOutgoingCallsParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly CallHierarchyItem $item,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}