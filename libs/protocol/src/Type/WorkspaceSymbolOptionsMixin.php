<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-09-21
 */
trait WorkspaceSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * The server provides support to resolve additional information for a
     * workspace symbol.
     *
     * @since 3.17.0
     *
     * @readonly
     */
    public ?bool $resolveProvider = null;
}
