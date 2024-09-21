<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents an outgoing call, e.g. calling a getter from a method or a method
 * from a constructor etc.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class CallHierarchyOutgoingCall
{
    public function __construct(
        /**
         * The item that is called.
         */
        public readonly CallHierarchyItem $to,
        /**
         * The range at which this item is called. This is the range relative to
         * the caller, e.g the item passed to {@link * CallHierarchyItemProvider.provideCallHierarchyOutgoingCalls
         * `provideCallHierarchyOutgoingCalls`}
         * and not {@link CallHierarchyOutgoingCall.to `this.to`}.
         *
         * @var list<Range>
         */
        public readonly array $fromRanges = [],
    ) {}
}
