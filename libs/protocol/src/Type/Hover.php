<?php

namespace Lsp\Protocol\Type;

/**
 * The result of a hover request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class Hover
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param MarkupContent|string|object|list<string|object> $contents
     */
    final public function __construct(
        public readonly MarkupContent|string|object|array $contents,
        public readonly Range $range,
    ) {}
}
