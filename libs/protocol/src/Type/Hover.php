<?php

namespace Lsp\Protocol\Type;

/**
 * The result of a hover request.
 *
 * @generated
 */
final class Hover
{
    /**
     * @param MarkupContent|string|object|list<string|object> $contents
     */
    final public function __construct(
        public readonly MarkupContent|string|object|array $contents,
        public readonly Range|null $range = null,
    ) {}
}