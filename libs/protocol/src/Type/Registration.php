<?php

namespace Lsp\Protocol\Type;

/**
 * General parameters to register for a notification or to register a provider.
 *
 * @generated
 */
final class Registration
{
    final public function __construct(
        public readonly string $id,
        public readonly string $method,
        public readonly mixed $registerOptions,
    ) {}
}
