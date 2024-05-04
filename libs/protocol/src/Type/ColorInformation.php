<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a color range from a document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ColorInformation
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly Range $range,
        public readonly Color $color,
    ) {}
}
