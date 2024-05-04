<?php

namespace Lsp\Protocol\Type;

trait RenameOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Renames should be checked and tested before being executed.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since version 3.12.0
     */
    public readonly bool $prepareProvider;
}
