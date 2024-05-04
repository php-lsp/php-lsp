<?php

namespace Lsp\Protocol\Type;

/**
 * The result of a linked editing range request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class LinkedEditingRanges
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<Range> $ranges
     */
    final public function __construct(
        public readonly array $ranges,
        public readonly string $wordPattern,
    ) {}
}
