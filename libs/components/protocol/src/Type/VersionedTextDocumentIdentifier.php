<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to denote a specific version of a text document.
 */
final class VersionedTextDocumentIdentifier
{
    public function __construct(
        /**
         * The version number of this document.
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $version,
        /**
         * The text document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
    ) {}
}
