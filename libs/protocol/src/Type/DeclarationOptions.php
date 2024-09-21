<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class DeclarationOptions
{
    use DeclarationOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
