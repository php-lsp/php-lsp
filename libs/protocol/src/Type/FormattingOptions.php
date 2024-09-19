<?php

namespace Lsp\Protocol\Type;

/**
 * Value-object describing what options formatting should use.
 *
 * @generated
 */
final class FormattingOptions
{
    /**
     * @param int<0, 2147483647> $tabSize
     */
    final public function __construct(
        public readonly int $tabSize,
        public readonly bool $insertSpaces,
        public readonly bool|null $trimTrailingWhitespace = null,
        public readonly bool|null $insertFinalNewline = null,
        public readonly bool|null $trimFinalNewlines = null,
    ) {}
}