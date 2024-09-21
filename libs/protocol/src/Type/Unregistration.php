<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General parameters to unregister a request or notification.
 *
 * @generated 2024-09-21
 */
final class Unregistration
{
    public function __construct(
        /**
         * The id used to unregister the request or notification. Usually an id
         * provided during the register request.
         */
        public readonly string $id,
        /**
         * The method to unregister for.
         */
        public readonly string $method,
    ) {}
}
