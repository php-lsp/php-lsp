<?php

declare(strict_types=1);

namespace Lsp\Workspace\Project;

interface ProjectFactoryInterface
{
    /**
     * @param non-empty-string $uri
     * @param non-empty-string $name
     */
    public function create(string $uri, string $name): ProjectInterface;
}
