<?php

namespace Lsp\Protocol\Type;

trait DocumentLinkOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Document links have a resolve provider as well.
     *
     * @generated
     */
    public readonly bool $resolveProvider;
}
