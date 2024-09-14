<?php

namespace Lsp\Protocol\Type;

/**
 * The result of a linked editing range request.
 *
 * @generated
 *
 * @since 3.16.0
 */
final class LinkedEditingRanges
{
    /**
     * @param list<Range> $ranges
     */
    final public function __construct(
        public readonly array $ranges,
        public readonly string $wordPattern,
    ) {}
}
