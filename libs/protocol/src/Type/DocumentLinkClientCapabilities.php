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
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $tooltipSupport = null,
    ) {}
}