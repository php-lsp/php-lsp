<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-15
 */
final class ConfigurationItem
{
    public function __construct(
        /**
         * The scope to get the configuration section for.
         *
         * @var non-empty-string|null
         */
        public readonly ?string $scopeUri = null,
        /**
         * The configuration section asked for.
         */
        public readonly ?string $section = null,
    ) {}
}
