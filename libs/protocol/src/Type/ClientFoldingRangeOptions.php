<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-15
 */
final class ClientFoldingRangeOptions
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
