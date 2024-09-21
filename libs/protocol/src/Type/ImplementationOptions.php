<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class ImplementationOptions
{
    use ImplementationOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
