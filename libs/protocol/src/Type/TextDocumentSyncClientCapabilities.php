<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class TextDocumentSyncClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $willSave = null,
        public readonly bool|null $willSaveWaitUntil = null,
        public readonly bool|null $didSave = null,
    ) {}
}