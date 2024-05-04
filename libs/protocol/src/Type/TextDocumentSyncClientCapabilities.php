<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class TextDocumentSyncClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $willSave,
        public readonly bool $willSaveWaitUntil,
        public readonly bool $didSave,
    ) {}
}
