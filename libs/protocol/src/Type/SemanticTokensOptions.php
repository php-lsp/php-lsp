<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
class SemanticTokensOptions
{
    use SemanticTokensOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
