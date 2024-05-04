<?php

namespace Lsp\Protocol\Type;

trait DocumentSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * A human-readable string that is shown when multiple outlines trees
     * are shown for the same document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    public readonly string $label;
}
