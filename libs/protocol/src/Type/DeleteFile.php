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
     * @param non-empty-string $uri
     */
    final public function __construct(
        string $kind,
        public readonly string $uri,
        public readonly DeleteFileOptions|null $options = null,
        string|null $annotationId = null,
    ) {
            $this->kind = $kind;
    
            $this->annotationId = $annotationId;
    }
}