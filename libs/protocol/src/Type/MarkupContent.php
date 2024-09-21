<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A `MarkupContent` literal represents a string value which content is
 * interpreted base on its kind flag. Currently the protocol supports
 * `plaintext` and `markdown` as markup kinds.
 *
 * If the kind is `markdown` then the value can contain fenced code blocks like
 * in GitHub issues.
 * See
 * https://help.github.com/articles/creating-and-highlighting-code-blocks/#syntax-highlighting
 *
 * Here is an example how such a string can be constructed using JavaScript /
 * TypeScript:
 * ```ts let markdown: MarkdownContent = {
 *  kind: MarkupKind.Markdown,
 *  value: [
 *    '# Header',
 *    'Some text',
 *    '```typescript',
 *    'someCode();',
 *    '```'
 *  ].join('\n')
 * };
 * ```
 *
 * *Please Note* that clients might sanitize the return markdown. A client could
 * decide to remove HTML from the markdown to avoid script execution.
 *
 * @generated 2024-09-21
 */
final class MarkupContent
{
    public function __construct(
        /**
         * The type of the Markup.
         */
        public readonly MarkupKind $kind,
        /**
         * The content itself.
         */
        public readonly string $value,
    ) {}
}
