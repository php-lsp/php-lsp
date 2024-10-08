<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a location inside a resource, such as a line inside a text file.
 *
 * @generated 2024-09-21
 */
final class Location
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        public readonly string $uri,
        public readonly Range $range,
    ) {}
}
