<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to regular expressions.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class RegularExpressionsClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $engine,
        public readonly string $version,
    ) {}
}
