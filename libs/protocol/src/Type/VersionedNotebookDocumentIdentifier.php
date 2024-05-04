<?php

namespace Lsp\Protocol\Type;

/**
 * A versioned notebook document identifier.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class VersionedNotebookDocumentIdentifier
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param int<-2147483648, 2147483647> $version
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly int $version,
        public readonly string $uri,
    ) {}
}
