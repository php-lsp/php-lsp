<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describes the currently selected completion item.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 */
final class SelectedCompletionInfo
{
    public function __construct(
        /**
         * The range that will be replaced if this completion item is accepted.
         */
        public readonly Range $range,
        /**
         * The text the range will be replaced with if this completion is
         * accepted.
         */
        public readonly string $text,
    ) {}
}
