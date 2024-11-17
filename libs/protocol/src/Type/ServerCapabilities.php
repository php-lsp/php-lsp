<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by a language server.
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
        public readonly HoverOptions|bool|null $hoverProvider = null,
        /**
         * The server provides signature help support.
         */
        public readonly ?SignatureHelpOptions $signatureHelpProvider = null,
        /**
         * The server provides Goto Declaration support.
         */
        public readonly DeclarationOptions|DeclarationRegistrationOptions|bool|null $declarationProvider = null,
        /**
         * The server provides goto definition support.
         */
        public readonly DefinitionOptions|bool|null $definitionProvider = null,
        /**
         * The server provides Goto Type Definition support.
         */
        public readonly TypeDefinitionOptions|TypeDefinitionRegistrationOptions|bool|null $typeDefinitionProvider = null,
        /**
         * The server provides Goto Implementation support.
         */
        public readonly ImplementationOptions|ImplementationRegistrationOptions|bool|null $implementationProvider = null,
        /**
         * The server provides find references support.
         */
        public readonly ReferenceOptions|bool|null $referencesProvider = null,
        /**
         * The server provides document highlight support.
         */
        public readonly DocumentHighlightOptions|bool|null $documentHighlightProvider = null,
        /**
         * The server provides document symbol support.
         */
        public readonly DocumentSymbolOptions|bool|null $documentSymbolProvider = null,
        /**
         * The server provides code actions. CodeActionOptions may only be
         * specified if the client states that it supports
         * `codeActionLiteralSupport` in its initial `initialize` request.
         */
        public readonly CodeActionOptions|bool|null $codeActionProvider = null,
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
        public readonly DocumentColorOptions|DocumentColorRegistrationOptions|bool|null $colorProvider = null,
        /**
         * The server provides workspace symbol support.
         */
        public readonly WorkspaceSymbolOptions|bool|null $workspaceSymbolProvider = null,
        /**
         * The server provides document formatting.
         */
        public readonly DocumentFormattingOptions|bool|null $documentFormattingProvider = null,
        /**
         * The server provides document range formatting.
         */
        public readonly DocumentRangeFormattingOptions|bool|null $documentRangeFormattingProvider = null,
        /**
         * The server provides document formatting on typing.
         */
        public readonly ?DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider = null,
        /**
         * The server provides rename support. RenameOptions may only be
         * specified if the client states that it supports `prepareSupport` in
         * its initial `initialize` request.
         */
        public readonly RenameOptions|bool|null $renameProvider = null,
        /**
         * The server provides folding provider support.
         */
        public readonly FoldingRangeOptions|FoldingRangeRegistrationOptions|bool|null $foldingRangeProvider = null,
        /**
         * The server provides selection range support.
         */
        public readonly SelectionRangeOptions|SelectionRangeRegistrationOptions|bool|null $selectionRangeProvider = null,
        /**
         * The server provides execute command support.
         */
        public readonly ?ExecuteCommandOptions $executeCommandProvider = null,
        /**
         * The server provides call hierarchy support.
         *
         * @since 3.16.0
         */
        public readonly CallHierarchyOptions|CallHierarchyRegistrationOptions|bool|null $callHierarchyProvider = null,
        /**
         * The server provides linked editing range support.
         *
         * @since 3.16.0
         */
        public readonly LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|bool|null $linkedEditingRangeProvider = null,
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
        public readonly MonikerOptions|MonikerRegistrationOptions|bool|null $monikerProvider = null,
        /**
         * The server provides type hierarchy support.
         *
         * @since 3.17.0
         */
        public readonly TypeHierarchyOptions|TypeHierarchyRegistrationOptions|bool|null $typeHierarchyProvider = null,
        /**
         * The server provides inline values.
         *
         * @since 3.17.0
         */
        public readonly InlineValueOptions|InlineValueRegistrationOptions|bool|null $inlineValueProvider = null,
        /**
         * The server provides inlay hints.
         *
         * @since 3.17.0
         */
        public readonly InlayHintOptions|InlayHintRegistrationOptions|bool|null $inlayHintProvider = null,
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
        public readonly InlineCompletionOptions|bool|null $inlineCompletionProvider = null,
        /**
         * Workspace specific server capabilities.
         */
        public readonly ?WorkspaceOptions $workspace = null,
        /**
         * Experimental server capabilities.
         */
        public readonly mixed $experimental = null,
    ) {}
}
