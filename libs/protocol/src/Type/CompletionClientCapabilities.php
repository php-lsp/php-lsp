<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Completion client capabilities.
 *
 * @generated 2024-11-14
 */
final class CompletionClientCapabilities
{
    public function __construct(
        /**
         * Whether completion supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports the following `CompletionItem` specific
         * capabilities.
         */
        public readonly ?ClientCompletionItemOptions $completionItem = null,
        public readonly ?ClientCompletionItemOptionsKind $completionItemKind = null,
        /**
         * Defines how the client handles whitespace and indentation when
         * accepting a completion item that uses multi line text in either
         * `insertText` or `textEdit`.
         *
         * @since 3.17.0
         */
        public readonly ?InsertTextMode $insertTextMode = null,
        /**
         * The client supports to send additional context information for a
         * `textDocument/completion` request.
         */
        public readonly ?bool $contextSupport = null,
        /**
         * The client supports the following `CompletionList` specific
         * capabilities.
         *
         * @since 3.17.0
         */
        public readonly ?CompletionListCapabilities $completionList = null,
    ) {}
}
