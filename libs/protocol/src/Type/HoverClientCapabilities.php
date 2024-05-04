<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class HoverClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<MarkupKind> $contentFormat
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly array $contentFormat,
    ) {}
}
