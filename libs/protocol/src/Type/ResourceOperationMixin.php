<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A generic resource operation.
 *
 * @generated 2024-11-14
 */
trait ResourceOperationMixin
{
    /**
     * The resource operation kind.
     */
    public readonly string $kind;
    /**
     * An optional annotation identifier describing the operation.
     *
     * @since 3.16.0
     *
     * @readonly
     */
    public ?string $annotationId = null;
}
