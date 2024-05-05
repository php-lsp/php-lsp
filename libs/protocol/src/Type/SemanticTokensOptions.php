<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.16.0
 */
class SemanticTokensOptions
{
    use SemanticTokensOptionsMixin;

    /**
     * @generated
     * @since 3.16.0
     */
    public function __construct(
        SemanticTokensLegend $legend,
        bool|object $range,
        bool|object $full,
        bool $workDoneProgress,
    ) {
        $this->legend = $legend;

        $this->range = $range;

        $this->full = $full;

        $this->workDoneProgress = $workDoneProgress;
    }
}
