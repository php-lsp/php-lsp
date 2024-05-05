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
     * @generated
     * @param non-empty-string $uri
     */
    final public function __construct(
        string $kind,
        public readonly string $uri,
        public readonly CreateFileOptions $options,
        string $annotationId,
    ) {
        $this->kind = $kind;

        $this->annotationId = $annotationId;
    }
}
