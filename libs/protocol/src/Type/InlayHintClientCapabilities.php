<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Inlay hint client capabilities.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class InlayHintClientCapabilities
{
    public function __construct(
        /**
         * Whether inlay hints support dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Indicates which properties a client can resolve lazily on an inlay
         * hint.
         */
        public readonly ?ClientInlayHintResolveOptions $resolveSupport = null,
    ) {}
}
