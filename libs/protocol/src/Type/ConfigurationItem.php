<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ConfigurationItem
{
    /**
     * @generated
     * @param non-empty-string $scopeUri
     */
    final public function __construct(
        public readonly string $scopeUri,
        public readonly string $section,
    ) {}
}
