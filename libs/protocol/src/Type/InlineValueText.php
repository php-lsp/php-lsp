<?php

namespace Lsp\Protocol\Type;

/**
 * Provide inline value as text.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueText
{
    final public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}
