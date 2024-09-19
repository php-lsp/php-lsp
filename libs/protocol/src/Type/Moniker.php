<?php

namespace Lsp\Protocol\Type;

/**
 * Moniker definition to match LSIF 0.5 moniker definition.
 *
 * @generated
 * @since 3.16.0
 */
final class Moniker
{
    final public function __construct(
        public readonly string $scheme,
        public readonly string $identifier,
        public readonly UniquenessLevel $unique,
        public readonly MonikerKind|null $kind = null,
    ) {}
}