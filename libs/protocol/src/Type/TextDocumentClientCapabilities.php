<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Text document specific client capabilities.
 */
final class TextDocumentClientCapabilities
{
    public function __construct(
        /**
         * Defines which synchronization capabilities the client supports.
         */
        public readonly ?TextDocumentSyncClientCapabilities $synchronization = null,
        /**
         * Capabilities specific to the `textDocument/completion` request.
         */
        public readonly ?CompletionClientCapabilities $completion = null,
        /**
         * Capabilities specific to the `textDocument/hover` request.
         */
        public readonly ?HoverClientCapabilities $hover = null,
        /**
         * Capabilities specific to the `textDocument/signatureHelp` request.
         */
        public readonly ?SignatureHelpClientCapabilities $signatureHelp = null,
        /**
         * Capabilities specific to the `textDocument/declaration` request.
         *
         * @since 3.14.0
         */
        public readonly ?DeclarationClientCapabilities $declaration = null,
        /**
         * Capabilities specific to the `textDocument/definition` request.
         */
        public readonly ?DefinitionClientCapabilities $definition = null,
        /**
         * Capabilities specific to the `textDocument/typeDefinition` request.
         *
         * @since 3.6.0
         */
        public readonly ?TypeDefinitionClientCapabilities $typeDefinition = null,
        /**
         * Capabilities specific to the `textDocument/implementation` request.
         *
         * @since 3.6.0
         */
        public readonly ?ImplementationClientCapabilities $implementation = null,
        /**
         * Capabilities specific to the `textDocument/references` request.
         */
        public readonly ?ReferenceClientCapabilities $references = null,
        /**
         * Capabilities specific to the `textDocument/documentHighlight`
         * request.
         */
        public readonly ?DocumentHighlightClientCapabilities $documentHighlight = null,
        /**
         * Capabilities specific to the `textDocument/documentSymbol` request.
         */
        public readonly ?DocumentSymbolClientCapabilities $documentSymbol = null,
        /**
         * Capabilities specific to the `textDocument/codeAction` request.
         */
        public readonly ?CodeActionClientCapabilities $codeAction = null,
        /**
         * Capabilities specific to the `textDocument/codeLens` request.
         */
        public readonly ?CodeLensClientCapabilities $codeLens = null,
        /**
         * Capabilities specific to the `textDocument/documentLink` request.
         */
        public readonly ?DocumentLinkClientCapabilities $documentLink = null,
        /**
         * Capabilities specific to the `textDocument/documentColor` and the
         * `textDocument/colorPresentation` request.
         *
         * @since 3.6.0
         */
        public readonly ?DocumentColorClientCapabilities $colorProvider = null,
        /**
         * Capabilities specific to the `textDocument/formatting` request.
         */
        public readonly ?DocumentFormattingClientCapabilities $formatting = null,
        /**
         * Capabilities specific to the `textDocument/rangeFormatting` request.
         */
        public readonly ?DocumentRangeFormattingClientCapabilities $rangeFormatting = null,
        /**
         * Capabilities specific to the `textDocument/onTypeFormatting` request.
         */
        public readonly ?DocumentOnTypeFormattingClientCapabilities $onTypeFormatting = null,
        /**
         * Capabilities specific to the `textDocument/rename` request.
         */
        public readonly ?RenameClientCapabilities $rename = null,
        /**
         * Capabilities specific to the `textDocument/foldingRange` request.
         *
         * @since 3.10.0
         */
        public readonly ?FoldingRangeClientCapabilities $foldingRange = null,
        /**
         * Capabilities specific to the `textDocument/selectionRange` request.
         *
         * @since 3.15.0
         */
        public readonly ?SelectionRangeClientCapabilities $selectionRange = null,
        /**
         * Capabilities specific to the `textDocument/publishDiagnostics`
         * notification.
         */
        public readonly ?PublishDiagnosticsClientCapabilities $publishDiagnostics = null,
        /**
         * Capabilities specific to the various call hierarchy requests.
         *
         * @since 3.16.0
         */
        public readonly ?CallHierarchyClientCapabilities $callHierarchy = null,
        /**
         * Capabilities specific to the various semantic token request.
         *
         * @since 3.16.0
         */
        public readonly ?SemanticTokensClientCapabilities $semanticTokens = null,
        /**
         * Capabilities specific to the `textDocument/linkedEditingRange`
         * request.
         *
         * @since 3.16.0
         */
        public readonly ?LinkedEditingRangeClientCapabilities $linkedEditingRange = null,
        /**
         * Client capabilities specific to the `textDocument/moniker` request.
         *
         * @since 3.16.0
         */
        public readonly ?MonikerClientCapabilities $moniker = null,
        /**
         * Capabilities specific to the various type hierarchy requests.
         *
         * @since 3.17.0
         */
        public readonly ?TypeHierarchyClientCapabilities $typeHierarchy = null,
        /**
         * Capabilities specific to the `textDocument/inlineValue` request.
         *
         * @since 3.17.0
         */
        public readonly ?InlineValueClientCapabilities $inlineValue = null,
        /**
         * Capabilities specific to the `textDocument/inlayHint` request.
         *
         * @since 3.17.0
         */
        public readonly ?InlayHintClientCapabilities $inlayHint = null,
        /**
         * Capabilities specific to the diagnostic pull model.
         *
         * @since 3.17.0
         */
        public readonly ?DiagnosticClientCapabilities $diagnostic = null,
        /**
         * Client capabilities specific to inline completions.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?InlineCompletionClientCapabilities $inlineCompletion = null,
    ) {}
}
