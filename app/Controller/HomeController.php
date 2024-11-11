<?php

declare(strict_types=1);

namespace App\Controller;

use Lsp\Kernel\Attribute\AsController;
use Lsp\Protocol\Type\InitializeParams;
use Lsp\Protocol\Type\InitializeResult;
use Lsp\Protocol\Type\InitializeResultServerInfo;
use Lsp\Protocol\Type\PositionEncodingKind;
use Lsp\Protocol\Type\ServerCapabilities;
use Lsp\Protocol\Type\TextDocumentSyncKind;
use Lsp\Router\Attribute\Route;

#[AsController, Route('initialize')]
final class HomeController
{
    public function __invoke(InitializeParams $request): InitializeResult
    {
        return new InitializeResult(
            capabilities: new ServerCapabilities(
                positionEncoding: PositionEncodingKind::UTF8,
                textDocumentSync: TextDocumentSyncKind::None,
            ),
            serverInfo: new InitializeResultServerInfo(
                name: 'example-lsp-server',
                version: '1.0',
            ),
        );
    }
}
