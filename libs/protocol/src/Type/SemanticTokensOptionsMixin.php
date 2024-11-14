<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
trait SemanticTokensOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * The legend used by the server.
     */
    public readonly SemanticTokensLegend $legend;
    /**
     * Server supports providing semantic tokens for a specific range of a
     * document.
     *
     * @readonly
     */
    public bool|SemanticTokensOptionsRange|null $range = null;
    /**
     * Server supports providing semantic tokens for a full document.
     *
     * @readonly
     */
    public bool|SemanticTokensOptionsFull|null $full = null;
}
