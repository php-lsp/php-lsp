<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The client capabilities of a {@link DocumentLinkRequest}.
 */
final class DocumentLinkClientCapabilities
{
    public function __construct(
        /**
         * Whether document link supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * Whether the client supports the `tooltip` property on `DocumentLink`.
         *
         * @since 3.15.0
         */
        public readonly ?bool $tooltipSupport = null,
    ) {}
}
