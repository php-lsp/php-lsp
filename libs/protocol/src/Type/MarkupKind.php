<?php

namespace Lsp\Protocol\Type;

/**
 * Describes the content type that a client supports in various
 * result literals like `Hover`, `ParameterInfo` or `CompletionItem`.
 *
 * Please note that `MarkupKinds` must not start with a `$`. This kinds
 * are reserved for internal usage.
 *
 * @generated
 */
enum MarkupKind: string
{
    /**
     * Plain text is supported as a content format
     *
     * @generated
     */
    case PlainText = 'plaintext';

    /**
     * Markdown is supported as a content format
     *
     * @generated
     */
    case Markdown = 'markdown';
}