<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class TextDocumentSyncOptions
{
    public function __construct(
        /**
         * Open and close notifications are sent to the server. If omitted open
         * close notification should not be sent.
         */
        public readonly ?bool $openClose = null,
        /**
         * Change notifications are sent to the server. See
         * TextDocumentSyncKind.None, TextDocumentSyncKind.Full and
         * TextDocumentSyncKind.Incremental. If omitted it defaults to
         * TextDocumentSyncKind.None.
         */
        public readonly ?TextDocumentSyncKind $change = null,
        /**
         * If present will save notifications are sent to the server. If omitted
         * the notification should not be sent.
         */
        public readonly ?bool $willSave = null,
        /**
         * If present will save wait until requests are sent to the server. If
         * omitted the request should not be sent.
         */
        public readonly ?bool $willSaveWaitUntil = null,
        /**
         * If present save notifications are sent to the server. If omitted the
         * notification should not be sent.
         */
        public readonly SaveOptions|bool|null $save = null,
    ) {}
}
