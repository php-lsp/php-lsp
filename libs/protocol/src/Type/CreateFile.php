<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Create file operation.
 *
 * @generated 2024-11-14
 */
final class CreateFile
{
    use ResourceOperationMixin;

    /**
     * @param string $kind the resource operation kind
     * @param string|null $annotationId an optional annotation identifier
     *        describing the operation
     */
    public function __construct(
        string $kind,
        /**
         * The resource to create.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Additional options.
         */
        public readonly ?CreateFileOptions $options = null,
        ?string $annotationId = null,
    ) {
        $this->kind = $kind;
        $this->annotationId = $annotationId;
    }
}
