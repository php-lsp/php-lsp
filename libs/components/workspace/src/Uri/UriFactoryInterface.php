<?php

declare(strict_types=1);

namespace Lsp\Workspace\Uri;

interface UriFactoryInterface
{
    /**
     * @param non-empty-string $uri
     */
    public function create(string $uri): Uri;
}
