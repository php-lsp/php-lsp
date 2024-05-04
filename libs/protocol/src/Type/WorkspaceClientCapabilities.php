<?php

namespace Lsp\Protocol\Type;

/**
 * Workspace specific client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $applyEdit,
        public readonly WorkspaceEditClientCapabilities $workspaceEdit,
        public readonly DidChangeConfigurationClientCapabilities $didChangeConfiguration,
        public readonly DidChangeWatchedFilesClientCapabilities $didChangeWatchedFiles,
        public readonly WorkspaceSymbolClientCapabilities $symbol,
        public readonly ExecuteCommandClientCapabilities $executeCommand,
        public readonly bool $workspaceFolders,
        public readonly bool $configuration,
        public readonly SemanticTokensWorkspaceClientCapabilities $semanticTokens,
        public readonly CodeLensWorkspaceClientCapabilities $codeLens,
        public readonly FileOperationClientCapabilities $fileOperations,
        public readonly InlineValueWorkspaceClientCapabilities $inlineValue,
        public readonly InlayHintWorkspaceClientCapabilities $inlayHint,
        public readonly DiagnosticWorkspaceClientCapabilities $diagnostics,
        public readonly FoldingRangeWorkspaceClientCapabilities $foldingRange,
    ) {}
}
