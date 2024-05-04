<?php

namespace Lsp\Protocol\Type;

/**
 * A generic resource operation.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class ResourceOperation
{
    use ResourceOperationMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(string $kind, string $annotationId)
    {
        $this->kind = $kind;

        $this->annotationId = $annotationId;
    }
}
