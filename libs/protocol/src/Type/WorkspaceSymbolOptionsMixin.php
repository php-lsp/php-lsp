<?php

namespace Lsp\Protocol\Type;

trait WorkspaceSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The server provides support to resolve additional
     * information for a workspace symbol.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    public readonly bool $resolveProvider;
}
