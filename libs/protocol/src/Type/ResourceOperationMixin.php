<?php

namespace Lsp\Protocol\Type;

trait ResourceOperationMixin
{
    /**
     * The resource operation kind.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly string $kind;

    /**
     * An optional annotation identifier describing the operation.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    public readonly string $annotationId;
}
