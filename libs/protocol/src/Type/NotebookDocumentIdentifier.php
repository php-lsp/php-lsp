<?php

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a notebook document in the client.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookDocumentIdentifier
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
    ) {}
}
