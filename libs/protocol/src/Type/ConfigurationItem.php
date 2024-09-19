<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class ConfigurationItem
{
    /**
     * @param non-empty-string|null $scopeUri
     */
    final public function __construct(
        public readonly string|null $scopeUri = null,
        public readonly string|null $section = null,
    ) {}
}