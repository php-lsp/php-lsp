<?php

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by the client.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly WorkspaceClientCapabilities $workspace,
        public readonly TextDocumentClientCapabilities $textDocument,
        public readonly NotebookDocumentClientCapabilities $notebookDocument,
        public readonly WindowClientCapabilities $window,
        public readonly GeneralClientCapabilities $general,
        public readonly mixed $experimental,
    ) {}
}
