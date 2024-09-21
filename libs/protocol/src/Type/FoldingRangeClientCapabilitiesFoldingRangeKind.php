<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class FoldingRangeClientCapabilitiesFoldingRangeKind
{
    public function __construct(
        /**
         * The folding range kind values the client supports. When this property
         * exists the client also guarantees that it will handle values outside
         * its set gracefully and falls back to a default value when unknown.
         *
         * @var list<FoldingRangeKind>|null
         */
        public readonly ?array $valueSet = null,
    ) {}
}
