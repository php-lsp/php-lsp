<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ConfigurationItem
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $scopeUri
     */
    final public function __construct(
        public readonly string $scopeUri,
        public readonly string $section,
    ) {}
}
