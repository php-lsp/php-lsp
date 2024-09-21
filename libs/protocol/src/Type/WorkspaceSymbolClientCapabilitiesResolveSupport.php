<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class WorkspaceSymbolClientCapabilitiesResolveSupport
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
