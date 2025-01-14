<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor\Document;

interface DocumentFactoryInterface
{
    /**
     * @param non-empty-string $uri
     * @param int<0, max> $version
     */
    public function create(string $uri, string $content, int $version = 0): Document;
}
