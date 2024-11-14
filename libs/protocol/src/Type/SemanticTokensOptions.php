<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class SemanticTokensOptions
{
    use SemanticTokensOptionsMixin;

    /**
     * @param SemanticTokensLegend $legend The legend used by the server
     * @param bool|SemanticTokensOptionsRange|null $range server supports
     *        providing semantic tokens for a specific range of a document
     * @param bool|SemanticTokensFullDelta|null $full server supports providing
     *        semantic tokens for a full document
     */
    public function __construct(
        SemanticTokensLegend $legend,
        bool|SemanticTokensOptionsRange|null $range = null,
        bool|SemanticTokensFullDelta|null $full = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->legend = $legend;
        $this->range = $range;
        $this->full = $full;
        $this->workDoneProgress = $workDoneProgress;
    }
}
