<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class DidChangeConfigurationRegistrationOptions
{
    public function __construct(
        /**
         * @var string|list<string>|null
         */
        public readonly string|array|null $section = null,
    ) {}
}
