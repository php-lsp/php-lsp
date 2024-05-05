<?php

namespace Lsp\Protocol\Type;

/**
 * A selection range represents a part of a selection hierarchy. A selection range
 * may have a parent selection range that contains it.
 *
 * @generated
 */
final class SelectionRange
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly Range $range,
        public readonly SelectionRange $parent,
    ) {}
}
