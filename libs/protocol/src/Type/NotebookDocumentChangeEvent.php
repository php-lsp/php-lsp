<?php

namespace Lsp\Protocol\Type;

/**
 * A change event for a notebook document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookDocumentChangeEvent
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param array<string, mixed> $metadata
     */
    final public function __construct(
        public readonly array $metadata,
        public readonly object $cells,
    ) {}
}
