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
        bool|SemanticTokensOptionsRange|null $range,
        bool|SemanticTokensOptionsFull|null $full,
        bool|null $workDoneProgress,
    ) {
            $this->legend = $legend;
    
            $this->range = $range;
    
            $this->full = $full;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}