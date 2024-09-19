<?php

namespace Lsp\Protocol\Type;

/**
 * Defines how the host (editor) should sync
 * document changes to the language server.
 *
 * @generated
 */
enum TextDocumentSyncKind: int
{
    /**
     * Documents should not be synced at all.
     *
     * @generated
     */
    case None = 0;

    /**
     * Documents are synced by always sending the full content
     * of the document.
     *
     * @generated
     */
    case Full = 1;

    /**
     * Documents are synced by sending the full content on open.
     * After that only incremental updates to the document are
     * send.
     *
     * @generated
     */
    case Incremental = 2;
}