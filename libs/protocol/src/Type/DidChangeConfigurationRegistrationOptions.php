<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class DidChangeConfigurationRegistrationOptions
{
    public function __construct(
        /**
         * @var string|list<string>|null
         */
        public readonly string|array|null $section = null,
    ) {}
}
