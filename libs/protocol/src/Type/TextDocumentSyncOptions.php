<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class TextDocumentSyncOptions
{
    final public function __construct(
        public readonly bool $openClose,
        public readonly TextDocumentSyncKind $change,
        public readonly bool $willSave,
        public readonly bool $willSaveWaitUntil,
        public readonly bool|SaveOptions $save,
    ) {}
}