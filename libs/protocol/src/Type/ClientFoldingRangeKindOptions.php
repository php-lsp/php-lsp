<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class ClientFoldingRangeKindOptions
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
