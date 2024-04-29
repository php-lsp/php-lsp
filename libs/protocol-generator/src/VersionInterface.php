<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator;

interface VersionInterface
{
    /**
     * @return non-empty-string
     */
    public function getVersion(): string;

    /**
     * @return non-empty-string
     */
    public function getPathname(): string;
}
