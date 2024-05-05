<?php

namespace Lsp\Protocol\Type;

/**
 * General parameters to unregister a request or notification.
 *
 * @generated
 */
final class Unregistration
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly string $id,
        public readonly string $method,
    ) {}
}
