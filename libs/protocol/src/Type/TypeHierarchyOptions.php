<?php

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
class TypeHierarchyOptions
{
    use TypeHierarchyOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
