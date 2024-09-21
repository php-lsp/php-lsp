<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-09-21
 */
trait DocumentSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * A human-readable string that is shown when multiple outlines trees are
     * shown for the same document.
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?string $label = null;
}
