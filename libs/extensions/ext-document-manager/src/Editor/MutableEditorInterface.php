<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor;

use Lsp\Extension\DocumentManager\Editor\Document\Document;

interface MutableEditorInterface extends EditorInterface
{
    public function open(Document $document): void;

    public function close(Document $document): void;
}
