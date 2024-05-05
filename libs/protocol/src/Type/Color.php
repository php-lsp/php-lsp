<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a color in RGBA space.
 *
 * @generated
 */
final class Color
{
    final public function __construct(
        public readonly float $red,
        public readonly float $green,
        public readonly float $blue,
        public readonly float $alpha,
    ) {}
}
