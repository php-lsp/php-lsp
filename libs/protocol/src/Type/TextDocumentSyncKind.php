<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Defines how the host (editor) should sync document changes to the language
 * server.
 */
enum TextDocumentSyncKind: int
{
    /**
     * Documents should not be synced at all.
     *
     * @var int<0, 2147483647>
     */
    case None = 0;
    /**
     * Documents are synced by always sending the full content of the document.
     *
     * @var int<0, 2147483647>
     */
    case Full = 1;
    /**
     * Documents are synced by sending the full content on open.
     * After that only incremental updates to the document are send.
     *
     * @var int<0, 2147483647>
     */
    case Incremental = 2;
}
