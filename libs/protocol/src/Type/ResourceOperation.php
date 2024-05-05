<?php

namespace Lsp\Protocol\Type;

/**
 * A generic resource operation.
 *
 * @generated
 */
class ResourceOperation
{
    use ResourceOperationMixin;

    /**
     * @generated
     */
    public function __construct(string $kind, string $annotationId)
    {
        $this->kind = $kind;

        $this->annotationId = $annotationId;
    }
}
