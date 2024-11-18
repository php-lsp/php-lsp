<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 */
final class SemanticTokensOptions
{
    public function __construct(
        /**
         * The legend used by the server.
         */
        public readonly SemanticTokensLegend $legend,
        /**
         * Server supports providing semantic tokens for a specific range of a
         * document.
         */
        public readonly SemanticTokensOptionsRange|bool|null $range = null,
        /**
         * Server supports providing semantic tokens for a full document.
         */
        public readonly SemanticTokensFullDelta|bool|null $full = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
