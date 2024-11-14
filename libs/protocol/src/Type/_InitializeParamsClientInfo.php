<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class _InitializeParamsClientInfo
{
    public function __construct(
        /**
         * The name of the client as defined by the client.
         */
        public readonly string $name,
        /**
         * The client's version as defined by the client.
         */
        public readonly ?string $version = null,
    ) {}
}
