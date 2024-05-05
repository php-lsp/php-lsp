<?php

namespace Lsp\Protocol\Type;

trait CodeLensOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Code lens has a resolve provider as well.
     *
     * @generated
     */
    public readonly bool $resolveProvider;
}