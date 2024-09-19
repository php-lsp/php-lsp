<?php

namespace Lsp\Protocol\Type;

/**
 * Represents an incoming call, e.g. a caller of a method or constructor.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyIncomingCall
{
    /**
     * @param list<Range> $fromRanges
     */
    final public function __construct(
        public readonly CallHierarchyItem $from,
        public readonly array $fromRanges,
    ) {}
}