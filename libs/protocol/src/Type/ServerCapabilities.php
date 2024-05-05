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
        public readonly PositionEncodingKind $positionEncoding,
        public readonly TextDocumentSyncOptions|TextDocumentSyncKind $textDocumentSync,
        public readonly NotebookDocumentSyncOptions|NotebookDocumentSyncRegistrationOptions $notebookDocumentSync,
        public readonly CompletionOptions $completionProvider,
        public readonly bool|HoverOptions $hoverProvider,
        public readonly SignatureHelpOptions $signatureHelpProvider,
        public readonly bool|DeclarationOptions|DeclarationRegistrationOptions $declarationProvider,
        public readonly bool|DefinitionOptions $definitionProvider,
        public readonly bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions $typeDefinitionProvider,
        public readonly bool|ImplementationOptions|ImplementationRegistrationOptions $implementationProvider,
        public readonly bool|ReferenceOptions $referencesProvider,
        public readonly bool|DocumentHighlightOptions $documentHighlightProvider,
        public readonly bool|DocumentSymbolOptions $documentSymbolProvider,
        public readonly bool|CodeActionOptions $codeActionProvider,
        public readonly CodeLensOptions $codeLensProvider,
        public readonly DocumentLinkOptions $documentLinkProvider,
        public readonly bool|DocumentColorOptions|DocumentColorRegistrationOptions $colorProvider,
        public readonly bool|WorkspaceSymbolOptions $workspaceSymbolProvider,
        public readonly bool|DocumentFormattingOptions $documentFormattingProvider,
        public readonly bool|DocumentRangeFormattingOptions $documentRangeFormattingProvider,
        public readonly DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider,
        public readonly bool|RenameOptions $renameProvider,
        public readonly bool|FoldingRangeOptions|FoldingRangeRegistrationOptions $foldingRangeProvider,
        public readonly bool|SelectionRangeOptions|SelectionRangeRegistrationOptions $selectionRangeProvider,
        public readonly ExecuteCommandOptions $executeCommandProvider,
        public readonly bool|CallHierarchyOptions|CallHierarchyRegistrationOptions $callHierarchyProvider,
        public readonly bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions $linkedEditingRangeProvider,
        public readonly SemanticTokensOptions|SemanticTokensRegistrationOptions $semanticTokensProvider,
        public readonly bool|MonikerOptions|MonikerRegistrationOptions $monikerProvider,
        public readonly bool|TypeHierarchyOptions|TypeHierarchyRegistrationOptions $typeHierarchyProvider,
        public readonly bool|InlineValueOptions|InlineValueRegistrationOptions $inlineValueProvider,
        public readonly bool|InlayHintOptions|InlayHintRegistrationOptions $inlayHintProvider,
        public readonly DiagnosticOptions|DiagnosticRegistrationOptions $diagnosticProvider,
        public readonly bool|InlineCompletionOptions $inlineCompletionProvider,
        public readonly ServerCapabilitiesWorkspace $workspace,
        public readonly mixed $experimental,
    ) {}
}