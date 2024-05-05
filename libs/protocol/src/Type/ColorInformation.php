<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a color range from a document.
 *
 * @generated
 */
final class ColorInformation
{
    final public function __construct(
        public readonly Range $range,
        public readonly Color $color,
    ) {}
}
