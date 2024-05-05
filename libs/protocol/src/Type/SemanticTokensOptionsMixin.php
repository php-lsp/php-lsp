<?php

namespace Lsp\Protocol\Type;

trait SemanticTokensOptionsMixin
{
    use WorkDoneProgressOptionsMixin;

    /**
     * The legend used by the server
     *
     * @generated
     */
    public readonly SemanticTokensLegend $legend;

    /**
     * Server supports providing semantic tokens for a specific range
     * of a document.
     *
     * @generated
     */
    public readonly bool|SemanticTokensOptionsRange $range;

    /**
     * Server supports providing semantic tokens for a full document.
     *
     * @generated
     */
    public readonly bool|SemanticTokensOptionsFull $full;
}
