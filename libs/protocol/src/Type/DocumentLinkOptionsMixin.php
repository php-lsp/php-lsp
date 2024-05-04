<?php

namespace Lsp\Protocol\Type;

trait DocumentLinkOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * Document links have a resolve provider as well.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly bool $resolveProvider;
}
