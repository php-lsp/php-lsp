<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Reference options.
 *
 * @generated 2024-09-21
 */
final class ReferenceOptions
{
    use ReferenceOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
