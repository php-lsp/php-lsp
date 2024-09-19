<?php

namespace Lsp\Protocol\Type;

/**
 * Workspace specific client capabilities.
 *
 * @generated
 */
final class WorkspaceClientCapabilities
{
    final public function __construct(
        public readonly bool|null $applyEdit = null,
        public readonly WorkspaceEditClientCapabilities|null $workspaceEdit = null,
        public readonly DidChangeConfigurationClientCapabilities|null $didChangeConfiguration = null,
        public readonly DidChangeWatchedFilesClientCapabilities|null $didChangeWatchedFiles = null,
        public readonly WorkspaceSymbolClientCapabilities|null $symbol = null,
        public readonly ExecuteCommandClientCapabilities|null $executeCommand = null,
        public readonly bool|null $workspaceFolders = null,
        public readonly bool|null $configuration = null,
        public readonly SemanticTokensWorkspaceClientCapabilities|null $semanticTokens = null,
        public readonly CodeLensWorkspaceClientCapabilities|null $codeLens = null,
        public readonly FileOperationClientCapabilities|null $fileOperations = null,
        public readonly InlineValueWorkspaceClientCapabilities|null $inlineValue = null,
        public readonly InlayHintWorkspaceClientCapabilities|null $inlayHint = null,
        public readonly DiagnosticWorkspaceClientCapabilities|null $diagnostics = null,
        public readonly FoldingRangeWorkspaceClientCapabilities|null $foldingRange = null,
    ) {}
}