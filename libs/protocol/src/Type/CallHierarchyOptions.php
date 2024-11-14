<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Call hierarchy options used during static registration.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class CallHierarchyOptions
{
    use CallHierarchyOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
