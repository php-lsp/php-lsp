<?php

namespace Lsp\Protocol\Type;

/**
 * Describes the content type that a client supports in various
 * result literals like `Hover`, `ParameterInfo` or `CompletionItem`.
 *
 * Please note that `MarkupKinds` must not start with a `$`. This kinds
 * are reserved for internal usage.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum MarkupKind: string
{
    /**
     * Plain text is supported as a content format
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case PlainText = 'plaintext';

    /**
     * Markdown is supported as a content format
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Markdown = 'markdown';
}
