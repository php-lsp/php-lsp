<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to regular expressions.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class RegularExpressionsClientCapabilities
{
    public function __construct(
        /**
         * The engine's name.
         */
        public readonly string $engine,
        /**
         * The engine's version.
         */
        public readonly ?string $version = null,
    ) {}
}
