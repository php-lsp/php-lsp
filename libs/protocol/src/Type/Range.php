<?php

namespace Lsp\Protocol\Type;

/**
 * A range in a text document expressed as (zero-based) start and end positions.
 *
 * If you want to specify a range that contains a line including the line ending
 * character(s) then use an end position denoting the start of the next line.
 * For example:
 * ```ts
 * {
 *     start: { line: 5, character: 23 }
 *     end : { line 6, character : 0 }
 * }
 * ```
 *
 * @generated
 */
final class Range
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly Position $start,
        public readonly Position $end,
    ) {}
}
