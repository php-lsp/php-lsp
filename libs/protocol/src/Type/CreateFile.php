<?php

namespace Lsp\Protocol\Type;

/**
 * Create file operation.
 *
 * @generated
 */
final class CreateFile
{
    use ResourceOperationMixin;

    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        string $kind,
        public readonly string $uri,
        public readonly CreateFileOptions|null $options = null,
        string|null $annotationId = null,
    ) {
            $this->kind = $kind;
    
            $this->annotationId = $annotationId;
    }
}