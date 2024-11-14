<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class SemanticTokensDelta
{
    public function __construct(
        public readonly ?string $resultId = null,
        /**
         * The semantic token edits to transform a previous result into a new
         * result.
         *
         * @var list<SemanticTokensEdit>
         */
        public readonly array $edits = [],
    ) {}
}
