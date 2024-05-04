<?php

namespace Lsp\Protocol\Type;

/**
 * A selection range represents a part of a selection hierarchy. A selection range
 * may have a parent selection range that contains it.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SelectionRange
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly Range $range,
        public readonly SelectionRange $parent,
    ) {}
}
