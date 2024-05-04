<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a location inside a resource, such as a line
 * inside a text file.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class Location
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly Range $range,
    ) {}
}
