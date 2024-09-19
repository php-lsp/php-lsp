<?php

namespace Lsp\Protocol\Type;

trait DocumentSymbolOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * A human-readable string that is shown when multiple outlines trees
     * are shown for the same document.
     *
     * @generated
     * @since 3.16.0
     */
    public string|null $label = null;
}