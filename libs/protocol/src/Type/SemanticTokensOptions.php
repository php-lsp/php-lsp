<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
class SemanticTokensOptions
{
    use SemanticTokensOptionsMixin;

    public function __construct(
        SemanticTokensLegend $legend,
        bool|SemanticTokensOptionsRange $range,
        bool|SemanticTokensOptionsFull $full,
        bool $workDoneProgress,
    ) {
        $this->legend = $legend;

        $this->range = $range;

        $this->full = $full;

        $this->workDoneProgress = $workDoneProgress;
    }
}
