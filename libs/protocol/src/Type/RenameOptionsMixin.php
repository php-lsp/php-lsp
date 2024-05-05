<?php

namespace Lsp\Protocol\Type;

trait RenameOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Renames should be checked and tested before being executed.
     *
     * @generated
     * @since version 3.12.0
     */
    public readonly bool $prepareProvider;
}
