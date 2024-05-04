<?php

namespace Lsp\Protocol\Type;

/**
 * Value-object describing what options formatting should use.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class FormattingOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<0, 2147483647> $tabSize
     */
    final public function __construct(
        public readonly int $tabSize,
        public readonly bool $insertSpaces,
        public readonly bool $trimTrailingWhitespace,
        public readonly bool $insertFinalNewline,
        public readonly bool $trimFinalNewlines,
    ) {}
}
