<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for the showDocument request.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class ShowDocumentClientCapabilities
{
    public function __construct(
        /**
         * The client has support for the showDocument request.
         */
        public readonly bool $support,
    ) {}
}
