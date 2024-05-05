<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class TextDocumentSyncClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $willSave,
        public readonly bool $willSaveWaitUntil,
        public readonly bool $didSave,
    ) {}
}
