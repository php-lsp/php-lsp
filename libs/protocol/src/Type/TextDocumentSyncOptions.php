<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class TextDocumentSyncOptions
{
    final public function __construct(
        public readonly bool|null $openClose = null,
        public readonly TextDocumentSyncKind|null $change = null,
        public readonly bool|null $willSave = null,
        public readonly bool|null $willSaveWaitUntil = null,
        public readonly bool|SaveOptions|null $save = null,
    ) {}
}