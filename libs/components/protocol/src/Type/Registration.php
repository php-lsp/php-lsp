<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * General parameters to register for a notification or to register a provider.
 */
final class Registration
{
    public function __construct(
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again.
         */
        public readonly string $id,
        /**
         * The method / capability to register for.
         */
        public readonly string $method,
        /**
         * Options necessary for the registration.
         */
        public readonly mixed $registerOptions = null,
    ) {}
}
