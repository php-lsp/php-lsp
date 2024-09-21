<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class TextDocumentSyncClientCapabilities
{
    public function __construct(
        /**
         * Whether text document synchronization supports dynamic registration.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports sending will save notifications.
         */
        public readonly ?bool $willSave = null,
        /**
         * The client supports sending a will save request and waits for a
         * response providing text edits which will be applied to the document
         * before it is saved.
         */
        public readonly ?bool $willSaveWaitUntil = null,
        /**
         * The client supports did save notifications.
         */
        public readonly ?bool $didSave = null,
    ) {}
}
