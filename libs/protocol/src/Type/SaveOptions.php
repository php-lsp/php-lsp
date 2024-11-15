<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Save options.
 *
 * @generated 2024-11-15
 */
final class SaveOptions
{
    public function __construct(
        /**
         * The client is supposed to include the content on save.
         */
        public readonly ?bool $includeText = null,
    ) {}
}
