<?php

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a notebook document in the client.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocumentIdentifier
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
    ) {}
}
