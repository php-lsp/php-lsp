<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class LinkedEditingRangeOptions
{
    use LinkedEditingRangeOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
