<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Defines the capabilities provided by the client.
 */
final class ClientCapabilities
{
    public function __construct(
        /**
         * Workspace specific client capabilities.
         */
        public readonly ?WorkspaceClientCapabilities $workspace = null,
        /**
         * Text document specific client capabilities.
         */
        public readonly ?TextDocumentClientCapabilities $textDocument = null,
        /**
         * Capabilities specific to the notebook document support.
         *
         * @since 3.17.0
         */
        public readonly ?NotebookDocumentClientCapabilities $notebookDocument = null,
        /**
         * Window specific client capabilities.
         */
        public readonly ?WindowClientCapabilities $window = null,
        /**
         * General client capabilities.
         *
         * @since 3.16.0
         */
        public readonly ?GeneralClientCapabilities $general = null,
        /**
         * Experimental client capabilities.
         */
        public readonly mixed $experimental = null,
    ) {}
}
