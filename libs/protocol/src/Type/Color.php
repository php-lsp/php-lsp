<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a color in RGBA space.
 *
 * @generated 2024-11-14
 */
final class Color
{
    public function __construct(
        /**
         * The red component of this color in the range [0-1].
         *
         * @var float|int<0, 1>
         */
        public readonly float|int $red,
        /**
         * The green component of this color in the range [0-1].
         *
         * @var float|int<0, 1>
         */
        public readonly float|int $green,
        /**
         * The blue component of this color in the range [0-1].
         *
         * @var float|int<0, 1>
         */
        public readonly float|int $blue,
        /**
         * The alpha component of this color in the range [0-1].
         *
         * @var float|int<0, 1>
         */
        public readonly float|int $alpha,
    ) {}
}
