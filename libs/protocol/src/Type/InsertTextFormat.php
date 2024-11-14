<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Defines whether the insert text in a completion item should be interpreted as
 * plain text or a snippet.
 *
 * @generated 2024-11-14
 */
enum InsertTextFormat: int
{
    /**
     * The primary text to be inserted is treated as a plain string.
     *
     * @var int<0, 2147483647>
     */
    case PlainText = 1;
    /**
     * The primary text to be inserted is treated as a snippet.
     *
     * A snippet can define tab stops and placeholders with `$1`, `$2` and
     * `${3:foo}`. `$0` defines the final tab stop, it defaults to the end of
     * the snippet. Placeholders with equal identifiers are linked,
     * that is typing in one will update others too.
     *
     * See also:
     * https://microsoft.github.io/language-server-protocol/specifications/specification-current/#snippet_syntax.
     *
     * @var int<0, 2147483647>
     */
    case Snippet = 2;
}
