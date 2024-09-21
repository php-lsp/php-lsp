<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `callHierarchy/outgoingCalls` request.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class CallHierarchyOutgoingCallsParams
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
        public readonly CallHierarchyItem $item,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
