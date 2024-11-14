<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a color range from a document.
 *
 * @generated 2024-11-14
 */
final class ColorInformation
{
    public function __construct(
        /**
         * The range in the document where this color appears.
         */
        public readonly Range $range,
        /**
         * The actual color value for this color range.
         */
        public readonly Color $color,
    ) {}
}
