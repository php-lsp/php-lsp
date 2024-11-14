<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static registration.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class TypeHierarchyOptions
{
    use TypeHierarchyOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
