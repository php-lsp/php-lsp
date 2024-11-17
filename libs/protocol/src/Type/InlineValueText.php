<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provide inline value as text.
 *
 * @since 3.17.0
 */
final class InlineValueText
{
    public function __construct(
        /**
         * The document range for which the inline value applies.
         */
        public readonly Range $range,
        /**
         * The text of the inline value.
         */
        public readonly string $text,
    ) {}
}
