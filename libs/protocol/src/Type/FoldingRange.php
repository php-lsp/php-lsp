<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a folding range. To be valid, start and end line must be bigger than zero and smaller
 * than the number of lines in the document. Clients are free to ignore invalid ranges.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class FoldingRange
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<0, 2147483647> $startLine
     * @param int<0, 2147483647> $startCharacter
     * @param int<0, 2147483647> $endLine
     * @param int<0, 2147483647> $endCharacter
     */
    final public function __construct(
        public readonly int $startLine,
        public readonly int $startCharacter,
        public readonly int $endLine,
        public readonly int $endCharacter,
        public readonly FoldingRangeKind $kind,
        public readonly string $collapsedText,
    ) {}
}
