<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @generated 2024-11-15
 */
final class RenameOptions
{
    public function __construct(
        /**
         * Renames should be checked and tested before being executed.
         *
         * @since version 3.12.0
         */
        public readonly ?bool $prepareProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
