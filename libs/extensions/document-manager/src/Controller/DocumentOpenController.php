<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Protocol\Type\DidOpenTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didOpen')]
final class DocumentOpenController
{
    public function __invoke(DidOpenTextDocumentParams $request): void
    {
        dump($request);
    }
}
