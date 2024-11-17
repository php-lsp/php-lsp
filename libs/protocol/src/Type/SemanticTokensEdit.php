<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.16.0
 */
final class SemanticTokensEdit
{
    public function __construct(
        /**
         * The start offset of the edit.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $start,
        /**
         * The count of elements to remove.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $deleteCount,
        /**
         * The elements to insert.
         *
         * @var list<int<0, 2147483647>>|null
         */
        public readonly ?array $data = null,
    ) {}
}
