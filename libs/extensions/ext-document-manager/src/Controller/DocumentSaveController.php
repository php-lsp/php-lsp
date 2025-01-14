<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Protocol\Type\DidSaveTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didSave')]
final class DocumentSaveController
{
    public function __invoke(DidSaveTextDocumentParams $request): void
    {
        // TODO
    }
}
