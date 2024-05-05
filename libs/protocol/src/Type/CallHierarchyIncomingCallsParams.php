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
     * @generated
     * @since 3.16.0
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
