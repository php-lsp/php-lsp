<?php

declare(strict_types=1);

namespace Lsp\Router\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class Route
{
    /**
     * @param non-empty-string $method
     */
    public function __construct(
        public readonly string $method,
    ) {}
}
