<?php

namespace Lsp\Protocol\Type;

/**
 * General parameters to unregister a request or notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class Unregistration
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly string $id,
        public readonly string $method,
    ) {}
}
