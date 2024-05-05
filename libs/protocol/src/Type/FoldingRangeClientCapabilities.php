<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class FoldingRangeClientCapabilities
{
    /**
     * @generated
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
