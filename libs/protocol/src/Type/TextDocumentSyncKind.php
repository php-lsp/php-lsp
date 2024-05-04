<?php

namespace Lsp\Protocol\Type;

/**
 * Defines how the host (editor) should sync
 * document changes to the language server.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum TextDocumentSyncKind: int
{
    /**
     * Documents should not be synced at all.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case None = 0;

    /**
     * Documents are synced by always sending the full content
     * of the document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Full = 1;

    /**
     * Documents are synced by sending the full content on open.
     * After that only incremental updates to the document are
     * send.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Incremental = 2;
}
