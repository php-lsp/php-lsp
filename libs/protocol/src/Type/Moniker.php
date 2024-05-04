<?php

namespace Lsp\Protocol\Type;

/**
 * Moniker definition to match LSIF 0.5 moniker definition.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class Moniker
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $scheme,
        public readonly string $identifier,
        public readonly UniquenessLevel $unique,
        public readonly MonikerKind $kind,
    ) {}
}
