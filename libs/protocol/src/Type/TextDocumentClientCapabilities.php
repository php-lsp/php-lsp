<?php

namespace Lsp\Protocol\Type;

/**
 * Text document specific client capabilities.
 *
 * @generated
 */
final class TextDocumentClientCapabilities
{
    final public function __construct(
        public readonly TextDocumentSyncClientCapabilities|null $synchronization = null,
        public readonly CompletionClientCapabilities|null $completion = null,
        public readonly HoverClientCapabilities|null $hover = null,
        public readonly SignatureHelpClientCapabilities|null $signatureHelp = null,
        public readonly DeclarationClientCapabilities|null $declaration = null,
        public readonly DefinitionClientCapabilities|null $definition = null,
        public readonly TypeDefinitionClientCapabilities|null $typeDefinition = null,
        public readonly ImplementationClientCapabilities|null $implementation = null,
        public readonly ReferenceClientCapabilities|null $references = null,
        public readonly DocumentHighlightClientCapabilities|null $documentHighlight = null,
        public readonly DocumentSymbolClientCapabilities|null $documentSymbol = null,
        public readonly CodeActionClientCapabilities|null $codeAction = null,
        public readonly CodeLensClientCapabilities|null $codeLens = null,
        public readonly DocumentLinkClientCapabilities|null $documentLink = null,
        public readonly DocumentColorClientCapabilities|null $colorProvider = null,
        public readonly DocumentFormattingClientCapabilities|null $formatting = null,
        public readonly DocumentRangeFormattingClientCapabilities|null $rangeFormatting = null,
        public readonly DocumentOnTypeFormattingClientCapabilities|null $onTypeFormatting = null,
        public readonly RenameClientCapabilities|null $rename = null,
        public readonly FoldingRangeClientCapabilities|null $foldingRange = null,
        public readonly SelectionRangeClientCapabilities|null $selectionRange = null,
        public readonly PublishDiagnosticsClientCapabilities|null $publishDiagnostics = null,
        public readonly CallHierarchyClientCapabilities|null $callHierarchy = null,
        public readonly SemanticTokensClientCapabilities|null $semanticTokens = null,
        public readonly LinkedEditingRangeClientCapabilities|null $linkedEditingRange = null,
        public readonly MonikerClientCapabilities|null $moniker = null,
        public readonly TypeHierarchyClientCapabilities|null $typeHierarchy = null,
        public readonly InlineValueClientCapabilities|null $inlineValue = null,
        public readonly InlayHintClientCapabilities|null $inlayHint = null,
        public readonly DiagnosticClientCapabilities|null $diagnostic = null,
        public readonly InlineCompletionClientCapabilities|null $inlineCompletion = null,
    ) {}
}