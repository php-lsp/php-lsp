<?php

namespace Lsp\Protocol\Type;

/**
 * General parameters to register for a notification or to register a provider.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class Registration
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly string $id,
        public readonly string $method,
        public readonly mixed $registerOptions,
    ) {}
}
