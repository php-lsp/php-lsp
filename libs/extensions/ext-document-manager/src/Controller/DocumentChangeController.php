<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Controller;

use Lsp\Extension\DocumentManager\Editor\EditorInterface;
use Lsp\Protocol\Type\DidChangeTextDocumentParams;
use Lsp\Protocol\Type\TextDocumentContentChangePartial;
use Lsp\Protocol\Type\TextDocumentContentChangeWholeDocument;
use Lsp\Router\Attribute\Route;

#[Route('textDocument/didChange')]
final class DocumentChangeController
{
    public function __invoke(
        EditorInterface $editor,
        DidChangeTextDocumentParams $request,
    ): void {
        $document = $editor->findByUriString($request->textDocument->uri);

        if ($document === null) {
            return;
        }

        foreach ($request->contentChanges as $change) {
            switch (true) {
                case $change instanceof TextDocumentContentChangeWholeDocument:
                    $document->updateAll($change, $request->textDocument->version);
                    break;

                case $change instanceof TextDocumentContentChangePartial:
                    $document->updatePartial($change, $request->textDocument->version);
                    break;

                default:
                    throw new \LogicException('Unsupported change type');
            }
        }
    }
}
