<?php

namespace Lsp\Protocol;

/**
 * Defines how the host (editor) should sync
 * document changes to the language server.
 */
enum TextDocumentSyncKind: int
{
    /**
     * Documents should not be synced at all.
     */
    case None = 0;

    /**
     * Documents are synced by always sending the full content
     * of the document.
     */
    case Full = 1;

    /**
     * Documents are synced by sending the full content on open.
     * After that only incremental updates to the document are
     * send.
     */
    case Incremental = 2;
}