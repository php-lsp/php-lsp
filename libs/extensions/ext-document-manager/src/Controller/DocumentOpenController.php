<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Extension\DocumentManager\Editor\Document\DocumentFactoryInterface;
use Lsp\Extension\DocumentManager\Editor\MutableEditorInterface;
use Lsp\Protocol\Type\DidOpenTextDocumentParams;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didOpen')]
final class DocumentOpenController
{
    public function __construct(
        private readonly DocumentFactoryInterface $documents,
    ) {}

    public function __invoke(
        MutableEditorInterface $editor,
        DidOpenTextDocumentParams $request,
    ): void {
        $document = $this->documents->create(
            uri: $request->textDocument->uri,
            content: $request->textDocument->text,
            version: $request->textDocument->version,
        );

        $editor->open($document);
    }
}
