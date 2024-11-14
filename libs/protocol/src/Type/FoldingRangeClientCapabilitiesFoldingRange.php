<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class FoldingRangeClientCapabilitiesFoldingRange
{
    public function __construct(
        /**
         * If set, the client signals that it supports setting collapsedText on
         * folding ranges to display custom labels instead of the default text.
         *
         * @since 3.17.0
         */
        public readonly ?bool $collapsedText = null,
    ) {}
}
