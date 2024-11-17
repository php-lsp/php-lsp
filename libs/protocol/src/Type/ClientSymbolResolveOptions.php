<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientSymbolResolveOptions
{
    public function __construct(
        /**
         * The properties that a client can resolve lazily. Usually
         * `location.range`.
         *
         * @var list<string>
         */
        public readonly array $properties = [],
    ) {}
}
