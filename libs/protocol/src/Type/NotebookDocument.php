<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook document.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocument
{
    /**
     * @param non-empty-string $uri
     * @param int<-2147483648, 2147483647> $version
     * @param array<string, mixed> $metadata
     * @param list<NotebookCell> $cells
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $notebookType,
        public readonly int $version,
        public readonly array $metadata,
        public readonly array $cells,
    ) {}
}