<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Location with only uri and does not include range.
 *
 * @since 3.18.0
 */
final class LocationUriOnly
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        public readonly string $uri,
    ) {}
}
