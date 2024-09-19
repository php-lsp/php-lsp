<?php

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by a language
 * server.
 *
 * @generated
 */
final class ServerCapabilities
{
    final public function __construct(
        public readonly PositionEncodingKind|null $positionEncoding = null,
        public readonly TextDocumentSyncOptions|TextDocumentSyncKind|null $textDocumentSync = null,
        public readonly NotebookDocumentSyncOptions|NotebookDocumentSyncRegistrationOptions|null $notebookDocumentSync = null,
        public readonly CompletionOptions|null $completionProvider = null,
        public readonly bool|HoverOptions|null $hoverProvider = null,
        public readonly SignatureHelpOptions|null $signatureHelpProvider = null,
        public readonly bool|DeclarationOptions|DeclarationRegistrationOptions|null $declarationProvider = null,
        public readonly bool|DefinitionOptions|null $definitionProvider = null,
        public readonly bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions|null $typeDefinitionProvider = null,
        public readonly bool|ImplementationOptions|ImplementationRegistrationOptions|null $implementationProvider = null,
        public readonly bool|ReferenceOptions|null $referencesProvider = null,
        public readonly bool|DocumentHighlightOptions|null $documentHighlightProvider = null,
        public readonly bool|DocumentSymbolOptions|null $documentSymbolProvider = null,
        public readonly bool|CodeActionOptions|null $codeActionProvider = null,
        public readonly CodeLensOptions|null $codeLensProvider = null,
        public readonly DocumentLinkOptions|null $documentLinkProvider = null,
        public readonly bool|DocumentColorOptions|DocumentColorRegistrationOptions|null $colorProvider = null,
        public readonly bool|WorkspaceSymbolOptions|null $workspaceSymbolProvider = null,
        public readonly bool|DocumentFormattingOptions|null $documentFormattingProvider = null,
        public readonly bool|DocumentRangeFormattingOptions|null $documentRangeFormattingProvider = null,
        public readonly DocumentOnTypeFormattingOptions|null $documentOnTypeFormattingProvider = null,
        public readonly bool|RenameOptions|null $renameProvider = null,
        public readonly bool|FoldingRangeOptions|FoldingRangeRegistrationOptions|null $foldingRangeProvider = null,
        public readonly bool|SelectionRangeOptions|SelectionRangeRegistrationOptions|null $selectionRangeProvider = null,
        public readonly ExecuteCommandOptions|null $executeCommandProvider = null,
        public readonly bool|CallHierarchyOptions|CallHierarchyRegistrationOptions|null $callHierarchyProvider = null,
        public readonly bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|null $linkedEditingRangeProvider = null,
        public readonly SemanticTokensOptions|SemanticTokensRegistrationOptions|null $semanticTokensProvider = null,
        public readonly bool|MonikerOptions|MonikerRegistrationOptions|null $monikerProvider = null,
        public readonly bool|TypeHierarchyOptions|TypeHierarchyRegistrationOptions|null $typeHierarchyProvider = null,
        public readonly bool|InlineValueOptions|InlineValueRegistrationOptions|null $inlineValueProvider = null,
        public readonly bool|InlayHintOptions|InlayHintRegistrationOptions|null $inlayHintProvider = null,
        public readonly DiagnosticOptions|DiagnosticRegistrationOptions|null $diagnosticProvider = null,
        public readonly bool|InlineCompletionOptions|null $inlineCompletionProvider = null,
        public readonly ServerCapabilitiesWorkspace|null $workspace = null,
        public readonly mixed $experimental = null,
    ) {}
}