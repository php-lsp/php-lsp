<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a location inside a resource, such as a line
 * inside a text file.
 *
 * @generated
 */
final class Location
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly Range $range,
    ) {}
}