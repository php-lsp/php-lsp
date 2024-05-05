<?php

namespace Lsp\Protocol\Type;

/**
 * Type hierarchy options used during static registration.
 *
 * @generated
 * @since 3.17.0
 */
class TypeHierarchyOptions
{
    use TypeHierarchyOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}