<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by a language server.
 *
 * @generated 2024-09-21
 */
final class ServerCapabilities
{
    public function __construct(
        /**
         * The position encoding the server picked from the encodings offered by
         * the client via the client capability `general.positionEncodings`.
         *
         * If the client didn't provide any position encodings the only valid
         * value that a server can return is 'utf-16'.
         *
         * If omitted it defaults to 'utf-16'.
         *
         * @since 3.17.0
         */
        public readonly ?PositionEncodingKind $positionEncoding = null,
        /**
         * Defines how text documents are synced. Is either a detailed structure
         * defining each notification or for backwards compatibility the
         * TextDocumentSyncKind number.
         */
        public readonly TextDocumentSyncOptions|TextDocumentSyncKind|null $textDocumentSync = null,
        /**
         * Defines how notebook documents are synced.
         *
         * @since 3.17.0
         */
        public readonly NotebookDocumentSyncOptions|NotebookDocumentSyncRegistrationOptions|null $notebookDocumentSync = null,
        /**
         * The server provides completion support.
         */
        public readonly ?CompletionOptions $completionProvider = null,
        /**
         * The server provides hover support.
         */
        public readonly bool|HoverOptions|null $hoverProvider = null,
        /**
         * The server provides signature help support.
         */
        public readonly ?SignatureHelpOptions $signatureHelpProvider = null,
        /**
         * The server provides Goto Declaration support.
         */
        public readonly bool|DeclarationOptions|DeclarationRegistrationOptions|null $declarationProvider = null,
        /**
         * The server provides goto definition support.
         */
        public readonly bool|DefinitionOptions|null $definitionProvider = null,
        /**
         * The server provides Goto Type Definition support.
         */
        public readonly bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions|null $typeDefinitionProvider = null,
        /**
         * The server provides Goto Implementation support.
         */
        public readonly bool|ImplementationOptions|ImplementationRegistrationOptions|null $implementationProvider = null,
        /**
         * The server provides find references support.
         */
        public readonly bool|ReferenceOptions|null $referencesProvider = null,
        /**
         * The server provides document highlight support.
         */
        public readonly bool|DocumentHighlightOptions|null $documentHighlightProvider = null,
        /**
         * The server provides document symbol support.
         */
        public readonly bool|DocumentSymbolOptions|null $documentSymbolProvider = null,
        /**
         * The server provides code actions. CodeActionOptions may only be
         * specified if the client states that it supports
         * `codeActionLiteralSupport` in its initial `initialize` request.
         */
        public readonly bool|CodeActionOptions|null $codeActionProvider = null,
        /**
         * The server provides code lens.
         */
        public readonly ?CodeLensOptions $codeLensProvider = null,
        /**
         * The server provides document link support.
         */
        public readonly ?DocumentLinkOptions $documentLinkProvider = null,
        /**
         * The server provides color provider support.
         */
        public readonly bool|DocumentColorOptions|DocumentColorRegistrationOptions|null $colorProvider = null,
        /**
         * The server provides workspace symbol support.
         */
        public readonly bool|WorkspaceSymbolOptions|null $workspaceSymbolProvider = null,
        /**
         * The server provides document formatting.
         */
        public readonly bool|DocumentFormattingOptions|null $documentFormattingProvider = null,
        /**
         * The server provides document range formatting.
         */
        public readonly bool|DocumentRangeFormattingOptions|null $documentRangeFormattingProvider = null,
        /**
         * The server provides document formatting on typing.
         */
        public readonly ?DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider = null,
        /**
         * The server provides rename support. RenameOptions may only be
         * specified if the client states that it supports `prepareSupport` in
         * its initial `initialize` request.
         */
        public readonly bool|RenameOptions|null $renameProvider = null,
        /**
         * The server provides folding provider support.
         */
        public readonly bool|FoldingRangeOptions|FoldingRangeRegistrationOptions|null $foldingRangeProvider = null,
        /**
         * The server provides selection range support.
         */
        public readonly bool|SelectionRangeOptions|SelectionRangeRegistrationOptions|null $selectionRangeProvider = null,
        /**
         * The server provides execute command support.
         */
        public readonly ?ExecuteCommandOptions $executeCommandProvider = null,
        /**
         * The server provides call hierarchy support.
         *
         * @since 3.16.0
         */
        public readonly bool|CallHierarchyOptions|CallHierarchyRegistrationOptions|null $callHierarchyProvider = null,
        /**
         * The server provides linked editing range support.
         *
         * @since 3.16.0
         */
        public readonly bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|null $linkedEditingRangeProvider = null,
        /**
         * The server provides semantic tokens support.
         *
         * @since 3.16.0
         */
        public readonly SemanticTokensOptions|SemanticTokensRegistrationOptions|null $semanticTokensProvider = null,
        /**
         * The server provides moniker support.
         *
         * @since 3.16.0
         */
        public readonly bool|MonikerOptions|MonikerRegistrationOptions|null $monikerProvider = null,
        /**
         * The server provides type hierarchy support.
         *
         * @since 3.17.0
         */
        public readonly bool|TypeHierarchyOptions|TypeHierarchyRegistrationOptions|null $typeHierarchyProvider = null,
        /**
         * The server provides inline values.
         *
         * @since 3.17.0
         */
        public readonly bool|InlineValueOptions|InlineValueRegistrationOptions|null $inlineValueProvider = null,
        /**
         * The server provides inlay hints.
         *
         * @since 3.17.0
         */
        public readonly bool|InlayHintOptions|InlayHintRegistrationOptions|null $inlayHintProvider = null,
        /**
         * The server has support for pull model diagnostics.
         *
         * @since 3.17.0
         */
        public readonly DiagnosticOptions|DiagnosticRegistrationOptions|null $diagnosticProvider = null,
        /**
         * Inline completion options used during static registration.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly bool|InlineCompletionOptions|null $inlineCompletionProvider = null,
        /**
         * Text document specific server capabilities.
         *
         * @since 3.18.0
         */
        public readonly ?ServerCapabilitiesTextDocument $textDocument = null,
        /**
         * Workspace specific server capabilities.
         */
        public readonly ?ServerCapabilitiesWorkspace $workspace = null,
        /**
         * Experimental server capabilities.
         */
        public readonly mixed $experimental = null,
    ) {}
}
