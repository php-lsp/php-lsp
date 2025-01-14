<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Extension\DocumentManager\Editor\MutableEditorInterface;
use Lsp\Protocol\Type\DidCloseTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didClose')]
final class DocumentCloseController
{
    public function __invoke(
        MutableEditorInterface $editor,
        DidCloseTextDocumentParams $request,
    ): void {
        $document = $editor->findByUriString($request->textDocument->uri);

        if ($document !== null) {
            $editor->close($document);
        }
    }
}
