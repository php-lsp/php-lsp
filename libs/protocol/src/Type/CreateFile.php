<?php

namespace Lsp\Protocol\Type;

/**
 * Create file operation.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CreateFile
{
    use ResourceOperationMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
