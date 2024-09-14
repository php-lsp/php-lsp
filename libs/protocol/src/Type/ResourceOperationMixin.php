<?php

namespace Lsp\Protocol\Type;

trait ResourceOperationMixin
{
    /**
     * The resource operation kind.
     *
     * @generated
     */
    public readonly string $kind;

    /**
     * An optional annotation identifier describing the operation.
     *
     * @generated
     *
     * @since 3.16.0
     */
    public readonly string $annotationId;
}
