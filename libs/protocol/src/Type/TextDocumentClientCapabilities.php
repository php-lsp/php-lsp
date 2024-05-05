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
        public readonly TextDocumentSyncClientCapabilities $synchronization,
        public readonly CompletionClientCapabilities $completion,
        public readonly HoverClientCapabilities $hover,
        public readonly SignatureHelpClientCapabilities $signatureHelp,
        public readonly DeclarationClientCapabilities $declaration,
        public readonly DefinitionClientCapabilities $definition,
        public readonly TypeDefinitionClientCapabilities $typeDefinition,
        public readonly ImplementationClientCapabilities $implementation,
        public readonly ReferenceClientCapabilities $references,
        public readonly DocumentHighlightClientCapabilities $documentHighlight,
        public readonly DocumentSymbolClientCapabilities $documentSymbol,
        public readonly CodeActionClientCapabilities $codeAction,
        public readonly CodeLensClientCapabilities $codeLens,
        public readonly DocumentLinkClientCapabilities $documentLink,
        public readonly DocumentColorClientCapabilities $colorProvider,
        public readonly DocumentFormattingClientCapabilities $formatting,
        public readonly DocumentRangeFormattingClientCapabilities $rangeFormatting,
        public readonly DocumentOnTypeFormattingClientCapabilities $onTypeFormatting,
        public readonly RenameClientCapabilities $rename,
        public readonly FoldingRangeClientCapabilities $foldingRange,
        public readonly SelectionRangeClientCapabilities $selectionRange,
        public readonly PublishDiagnosticsClientCapabilities $publishDiagnostics,
        public readonly CallHierarchyClientCapabilities $callHierarchy,
        public readonly SemanticTokensClientCapabilities $semanticTokens,
        public readonly LinkedEditingRangeClientCapabilities $linkedEditingRange,
        public readonly MonikerClientCapabilities $moniker,
        public readonly TypeHierarchyClientCapabilities $typeHierarchy,
        public readonly InlineValueClientCapabilities $inlineValue,
        public readonly InlayHintClientCapabilities $inlayHint,
        public readonly DiagnosticClientCapabilities $diagnostic,
        public readonly InlineCompletionClientCapabilities $inlineCompletion,
    ) {}
}
