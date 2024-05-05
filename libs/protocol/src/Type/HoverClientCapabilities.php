<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class HoverClientCapabilities
{
    /**
     * @param list<MarkupKind> $contentFormat
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly array $contentFormat,
    ) {}
}
