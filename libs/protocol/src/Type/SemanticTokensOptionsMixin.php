<?php

namespace Lsp\Protocol\Type;

trait SemanticTokensOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The legend used by the server
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly SemanticTokensLegend $legend;

    /**
     * Server supports providing semantic tokens for a specific range
     * of a document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly bool|object $range;

    /**
     * Server supports providing semantic tokens for a full document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly bool|object $full;
}
