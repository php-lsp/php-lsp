<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Protocol\Type\DidCloseTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didClose')]
final class DocumentCloseController
{
    public function __invoke(DidCloseTextDocumentParams $request): void
    {
        dump($request);
    }
}
