<?php

namespace Lsp\Protocol\Type;

/**
 * Represents an outgoing call, e.g. calling a getter from a method or a method from a constructor etc.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyOutgoingCall
{
    /**
     * @generated
     * @since 3.16.0
     * @param list<Range> $fromRanges
     */
    final public function __construct(
        public readonly CallHierarchyItem $to,
        public readonly array $fromRanges,
    ) {}
}
