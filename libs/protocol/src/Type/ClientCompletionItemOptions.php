<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class ClientCompletionItemOptions
{
    public function __construct(
        /**
         * Client supports snippets as insert text.
         *
         * A snippet can define tab stops and placeholders with `$1`, `$2` and
         * `${3:foo}`. `$0` defines the final tab stop, it defaults to the end
         * of the snippet. Placeholders with equal identifiers are linked,
         * that is typing in one will update others too.
         */
        public readonly ?bool $snippetSupport = null,
        /**
         * Client supports commit characters on a completion item.
         */
        public readonly ?bool $commitCharactersSupport = null,
        /**
         * Client supports the following content formats for the documentation
         * property. The order describes the preferred format of the client.
         *
         * @var list<MarkupKind>|null
         */
        public readonly ?array $documentationFormat = null,
        /**
         * Client supports the deprecated property on a completion item.
         */
        public readonly ?bool $deprecatedSupport = null,
        /**
         * Client supports the preselect property on a completion item.
         */
        public readonly ?bool $preselectSupport = null,
        /**
         * Client supports the tag property on a completion item. Clients
         * supporting tags have to handle unknown tags gracefully. Clients
         * especially need to preserve unknown tags when sending a completion
         * item back to the server in a resolve call.
         *
         * @since 3.15.0
         */
        public readonly ?CompletionItemTagOptions $tagSupport = null,
        /**
         * Client support insert replace edit to control different behavior if a
         * completion item is inserted in the text or should replace text.
         *
         * @since 3.16.0
         */
        public readonly ?bool $insertReplaceSupport = null,
        /**
         * Indicates which properties a client can resolve lazily on a
         * completion item. Before version 3.16.0 only the predefined properties
         * `documentation` and `details` could be resolved lazily.
         *
         * @since 3.16.0
         */
        public readonly ?ClientCompletionItemResolveOptions $resolveSupport = null,
        /**
         * The client supports the `insertTextMode` property on a completion
         * item to override the whitespace handling mode as defined by the
         * client (see `insertTextMode`).
         *
         * @since 3.16.0
         */
        public readonly ?ClientCompletionItemInsertTextModeOptions $insertTextModeSupport = null,
        /**
         * The client has support for completion item label details (see also
         * `CompletionItemLabelDetails`).
         *
         * @since 3.17.0
         */
        public readonly ?bool $labelDetailsSupport = null,
    ) {}
}
