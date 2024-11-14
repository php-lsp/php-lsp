<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a notebook document in the client.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class NotebookDocumentIdentifier
{
    public function __construct(
        /**
         * The notebook document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
    ) {}
}
