<?php

namespace Lsp\Protocol\Type;

/**
 * Provide inline value as text.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlineValueText
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}
