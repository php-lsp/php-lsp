<?php

namespace Lsp\Protocol\Type;

/**
 * Call hierarchy options used during static registration.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
class CallHierarchyOptions
{
    use CallHierarchyOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
