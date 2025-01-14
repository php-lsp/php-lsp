<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor;

use Lsp\Contracts\Rpc\Message\MessageInterface;

interface EditorProviderInterface
{
    public function getEditor(MessageInterface $message): ?EditorInterface;
}
