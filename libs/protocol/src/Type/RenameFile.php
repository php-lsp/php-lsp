<?php

namespace Lsp\Protocol\Type;

/**
 * Rename file operation
 *
 * @generated
 */
final class RenameFile
{
    use ResourceOperationMixin;

    /**
     * @param non-empty-string $oldUri
     * @param non-empty-string $newUri
     */
    final public function __construct(
        string $kind,
        public readonly string $oldUri,
        public readonly string $newUri,
        public readonly RenameFileOptions|null $options = null,
        string|null $annotationId = null,
    ) {
            $this->kind = $kind;
    
            $this->annotationId = $annotationId;
    }
}