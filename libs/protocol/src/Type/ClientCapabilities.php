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
        public readonly WorkspaceClientCapabilities|null $workspace = null,
        public readonly TextDocumentClientCapabilities|null $textDocument = null,
        public readonly NotebookDocumentClientCapabilities|null $notebookDocument = null,
        public readonly WindowClientCapabilities|null $window = null,
        public readonly GeneralClientCapabilities|null $general = null,
        public readonly mixed $experimental = null,
    ) {}
}