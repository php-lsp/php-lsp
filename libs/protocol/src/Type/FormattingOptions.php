<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Value-object describing what options formatting should use.
 */
final class FormattingOptions
{
    public function __construct(
        /**
         * Size of a tab in spaces.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $tabSize,
        /**
         * Prefer spaces over tabs.
         */
        public readonly bool $insertSpaces,
        /**
         * Trim trailing whitespace on a line.
         *
         * @since 3.15.0
         */
        public readonly ?bool $trimTrailingWhitespace = null,
        /**
         * Insert a newline character at the end of the file if one does not
         * exist.
         *
         * @since 3.15.0
         */
        public readonly ?bool $insertFinalNewline = null,
        /**
         * Trim all newlines after the final newline at the end of the file.
         *
         * @since 3.15.0
         */
        public readonly ?bool $trimFinalNewlines = null,
    ) {}
}
