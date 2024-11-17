<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a change configuration notification.
 */
final class DidChangeConfigurationParams
{
    public function __construct(
        /**
         * The actual changed settings.
         */
        public readonly mixed $settings = null,
    ) {}
}
