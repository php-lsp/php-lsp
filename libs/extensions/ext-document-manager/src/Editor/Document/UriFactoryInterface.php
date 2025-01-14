<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

interface UriFactoryInterface
{
    /**
     * @param non-empty-string $uri
     */
    public function create(string $uri): Uri;
}
