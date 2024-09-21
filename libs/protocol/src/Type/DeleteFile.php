<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Delete file operation.
 *
 * @generated 2024-09-21
 */
final class DeleteFile
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
         * The file to delete.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Delete options.
         */
        public readonly ?DeleteFileOptions $options = null,
        ?string $annotationId = null,
    ) {
        $this->kind = $kind;
        $this->annotationId = $annotationId;
    }
}
