<?php

namespace Lsp\Protocol\Type;

/**
 * Delete file operation
 *
 * @generated
 */
final class DeleteFile
{
    use ResourceOperationMixin;

    /**
     * @generated
     * @param non-empty-string $uri
     */
    final public function __construct(
        string $kind,
        public readonly string $uri,
        public readonly DeleteFileOptions $options,
        string $annotationId,
    ) {
        $this->kind = $kind;

        $this->annotationId = $annotationId;
    }
}
