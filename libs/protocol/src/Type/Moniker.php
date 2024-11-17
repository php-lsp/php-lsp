<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Moniker definition to match LSIF 0.5 moniker definition.
 *
 * @since 3.16.0
 */
final class Moniker
{
    public function __construct(
        /**
         * The scheme of the moniker. For example tsc or .Net.
         */
        public readonly string $scheme,
        /**
         * The identifier of the moniker. The value is opaque in LSIF however
         * schema owners are allowed to define the structure if they want.
         */
        public readonly string $identifier,
        /**
         * The scope in which the moniker is unique.
         */
        public readonly UniquenessLevel $unique,
        /**
         * The moniker kind if known.
         */
        public readonly ?MonikerKind $kind = null,
    ) {}
}
