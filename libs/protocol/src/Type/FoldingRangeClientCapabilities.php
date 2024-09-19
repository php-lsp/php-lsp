<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class FoldingRangeClientCapabilities
{
    /**
     * @param int<0, 2147483647>|null $rangeLimit
     */
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly int|null $rangeLimit = null,
        public readonly bool|null $lineFoldingOnly = null,
        public readonly FoldingRangeClientCapabilitiesFoldingRangeKind|null $foldingRangeKind = null,
        public readonly FoldingRangeClientCapabilitiesFoldingRange|null $foldingRange = null,
    ) {}
}