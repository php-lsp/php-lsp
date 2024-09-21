<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Hover options.
 *
 * @generated 2024-09-21
 */
final class HoverOptions
{
    use HoverOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
