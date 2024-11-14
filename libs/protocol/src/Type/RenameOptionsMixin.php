<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @generated 2024-11-14
 */
trait RenameOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * Renames should be checked and tested before being executed.
     *
     * @since version 3.12.0
     *
     * @readonly
     */
    public ?bool $prepareProvider = null;
}
