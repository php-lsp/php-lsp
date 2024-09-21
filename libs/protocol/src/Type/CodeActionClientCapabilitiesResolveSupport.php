<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class CodeActionClientCapabilitiesResolveSupport
{
    public function __construct(
        /**
         * The properties that a client can resolve lazily.
         *
         * @var list<string>
         */
        public readonly array $properties = [],
    ) {}
}
