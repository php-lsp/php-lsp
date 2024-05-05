<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities specific to regular expressions.
 *
 * @generated
 * @since 3.16.0
 */
final class RegularExpressionsClientCapabilities
{
    final public function __construct(
        public readonly string $engine,
        public readonly string $version,
    ) {}
}
