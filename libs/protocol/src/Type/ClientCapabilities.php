<?php

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by the client.
 *
 * @generated
 */
final class ClientCapabilities
{
    final public function __construct(
        public readonly WorkspaceClientCapabilities $workspace,
        public readonly TextDocumentClientCapabilities $textDocument,
        public readonly NotebookDocumentClientCapabilities $notebookDocument,
        public readonly WindowClientCapabilities $window,
        public readonly GeneralClientCapabilities $general,
        public readonly mixed $experimental,
    ) {}
}