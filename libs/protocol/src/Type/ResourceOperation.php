<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A generic resource operation.
 *
 * @generated 2024-11-14
 */
final class ResourceOperation
{
    use ResourceOperationMixin;

    /**
     * @param string $kind the resource operation kind
     * @param string|null $annotationId an optional annotation identifier
     *        describing the operation
     */
    public function __construct(string $kind, ?string $annotationId = null)
    {
        $this->kind = $kind;
        $this->annotationId = $annotationId;
    }
}
