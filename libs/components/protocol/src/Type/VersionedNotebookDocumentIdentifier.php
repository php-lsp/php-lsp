<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A versioned notebook document identifier.
 *
 * @since 3.17.0
 */
final class VersionedNotebookDocumentIdentifier
{
    public function __construct(
        /**
         * The version number of this notebook document.
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $version,
        /**
         * The notebook document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
    ) {}
}
