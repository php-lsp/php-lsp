<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A selection range represents a part of a selection hierarchy. A selection
 * range may have a parent selection range that contains it.
 */
final class SelectionRange
{
    public function __construct(
        /**
         * The {@link Range range} of this selection range.
         */
        public readonly Range $range,
        /**
         * The parent selection range containing this range. Therefore
         * `parent.range` must contain `this.range`.
         */
        public readonly ?SelectionRange $parent = null,
    ) {}
}
