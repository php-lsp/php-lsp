<?php

declare(strict_types=1);

namespace Lsp\Kernel;

interface KernelInterface
{
    /**
     * Gets the environment.
     *
     * @return non-empty-string
     */
    public function getEnvironment(): string;

    /**
     * Checks if debug mode is enabled.
     */
    public function isDebug(): bool;
}
