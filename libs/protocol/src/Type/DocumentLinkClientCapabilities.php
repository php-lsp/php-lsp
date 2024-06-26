<?php

namespace Lsp\Protocol\Type;

/**
 * The client capabilities of a {@link DocumentLinkRequest}.
 *
 * @generated
 */
final class DocumentLinkClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $tooltipSupport,
    ) {}
}
