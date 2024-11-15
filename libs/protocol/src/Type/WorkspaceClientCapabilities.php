<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Workspace specific client capabilities.
 *
 * @generated 2024-11-15
 */
final class WorkspaceClientCapabilities
{
    public function __construct(
        /**
         * The client supports applying batch edits to the workspace by
         * supporting the request
         * 'workspace/applyEdit'.
         */
        public readonly ?bool $applyEdit = null,
        /**
         * Capabilities specific to `WorkspaceEdit`s.
         */
        public readonly ?WorkspaceEditClientCapabilities $workspaceEdit = null,
        /**
         * Capabilities specific to the `workspace/didChangeConfiguration`
         * notification.
         */
        public readonly ?DidChangeConfigurationClientCapabilities $didChangeConfiguration = null,
        /**
         * Capabilities specific to the `workspace/didChangeWatchedFiles`
         * notification.
         */
        public readonly ?DidChangeWatchedFilesClientCapabilities $didChangeWatchedFiles = null,
        /**
         * Capabilities specific to the `workspace/symbol` request.
         */
        public readonly ?WorkspaceSymbolClientCapabilities $symbol = null,
        /**
         * Capabilities specific to the `workspace/executeCommand` request.
         */
        public readonly ?ExecuteCommandClientCapabilities $executeCommand = null,
        /**
         * The client has support for workspace folders.
         *
         * @since 3.6.0
         */
        public readonly ?bool $workspaceFolders = null,
        /**
         * The client supports `workspace/configuration` requests.
         *
         * @since 3.6.0
         */
        public readonly ?bool $configuration = null,
        /**
         * Capabilities specific to the semantic token requests scoped to the
         * workspace.
         *
         * @since 3.16.0.
         */
        public readonly ?SemanticTokensWorkspaceClientCapabilities $semanticTokens = null,
        /**
         * Capabilities specific to the code lens requests scoped to the
         * workspace.
         *
         * @since 3.16.0.
         */
        public readonly ?CodeLensWorkspaceClientCapabilities $codeLens = null,
        /**
         * The client has support for file notifications/requests for user
         * operations on files.
         *
         * Since 3.16.0.
         */
        public readonly ?FileOperationClientCapabilities $fileOperations = null,
        /**
         * Capabilities specific to the inline values requests scoped to the
         * workspace.
         *
         * @since 3.17.0.
         */
        public readonly ?InlineValueWorkspaceClientCapabilities $inlineValue = null,
        /**
         * Capabilities specific to the inlay hint requests scoped to the
         * workspace.
         *
         * @since 3.17.0.
         */
        public readonly ?InlayHintWorkspaceClientCapabilities $inlayHint = null,
        /**
         * Capabilities specific to the diagnostic requests scoped to the
         * workspace.
         *
         * @since 3.17.0.
         */
        public readonly ?DiagnosticWorkspaceClientCapabilities $diagnostics = null,
        /**
         * Capabilities specific to the folding range requests scoped to the
         * workspace.
         *
         * @since 3.18.0
         *
         * @internal This is a proposed type, which means that the
         *           implementation of this type is not final. Please use this type at
         *           your own risk.
         */
        public readonly ?FoldingRangeWorkspaceClientCapabilities $foldingRange = null,
    ) {}
}
