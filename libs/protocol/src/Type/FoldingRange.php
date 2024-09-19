<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a folding range. To be valid, start and end line must be bigger than zero and smaller
 * than the number of lines in the document. Clients are free to ignore invalid ranges.
 *
 * @generated
 */
final class FoldingRange
{
    /**
     * @param int<0, 2147483647> $startLine
     * @param int<0, 2147483647>|null $startCharacter
     * @param int<0, 2147483647> $endLine
     * @param int<0, 2147483647>|null $endCharacter
     */
    final public function __construct(
        public readonly int $startLine,
        public readonly int $endLine,
        public readonly int|null $startCharacter = null,
        public readonly int|null $endCharacter = null,
        public readonly FoldingRangeKind|null $kind = null,
        public readonly string|null $collapsedText = null,
    ) {}
}