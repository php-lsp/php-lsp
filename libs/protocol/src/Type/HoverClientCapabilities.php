<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class HoverClientCapabilities
{
    /**
     * @param list<MarkupKind>|null $contentFormat
     */
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly array|null $contentFormat = null,
    ) {}
}