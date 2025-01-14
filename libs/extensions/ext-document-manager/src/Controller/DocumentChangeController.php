<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Protocol\Type\DidChangeTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didChange')]
final class DocumentChangeController
{
    public function __invoke(DidChangeTextDocumentParams $request): void
    {
        dump($request);
    }
}
