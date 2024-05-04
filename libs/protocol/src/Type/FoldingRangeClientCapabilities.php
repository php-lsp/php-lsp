<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class FoldingRangeClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<0, 2147483647> $rangeLimit
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly int $rangeLimit,
        public readonly bool $lineFoldingOnly,
        public readonly object $foldingRangeKind,
        public readonly object $foldingRange,
    ) {}
}
