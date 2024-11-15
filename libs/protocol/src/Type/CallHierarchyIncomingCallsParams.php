<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `callHierarchy/incomingCalls` request.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-15
 */
final class CallHierarchyIncomingCallsParams
{
    public function __construct(
        public readonly CallHierarchyItem $item,
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
