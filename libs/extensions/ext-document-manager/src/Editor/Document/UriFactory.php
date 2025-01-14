<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

final class UriFactory implements UriFactoryInterface
{
    public function create(string $uri): Uri
    {
        return new Uri($uri);
    }
}
