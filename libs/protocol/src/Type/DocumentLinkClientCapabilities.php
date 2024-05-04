<?php

namespace Lsp\Protocol\Type;

/**
 * The client capabilities of a {@link DocumentLinkRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentLinkClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $tooltipSupport,
    ) {}
}
