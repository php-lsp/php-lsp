<?php

namespace Lsp\Protocol\Type;

/**
 * Represents an outgoing call, e.g. calling a getter from a method or a method from a constructor etc.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class CallHierarchyOutgoingCall
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<Range> $fromRanges
     */
    final public function __construct(
        public readonly CallHierarchyItem $to,
        public readonly array $fromRanges,
    ) {}
}
