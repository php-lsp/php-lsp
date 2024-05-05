<?php

namespace Lsp\Protocol\Type;

trait WorkspaceSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The server provides support to resolve additional
     * information for a workspace symbol.
     *
     * @generated
     * @since 3.17.0
     */
    public readonly bool $resolveProvider;
}
