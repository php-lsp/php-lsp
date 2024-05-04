<?php

namespace Lsp\Protocol\Type;

/**
 * Represents an incoming call, e.g. a caller of a method or constructor.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class CallHierarchyIncomingCall
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<Range> $fromRanges
     */
    final public function __construct(
        public readonly CallHierarchyItem $from,
        public readonly array $fromRanges,
    ) {}
}
