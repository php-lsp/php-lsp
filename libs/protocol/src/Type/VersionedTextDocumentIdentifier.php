<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to denote a specific version of a text document.
 *
 * @generated 2024-11-14
 */
final class VersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @param non-empty-string $uri the text document's uri
     */
    public function __construct(
        /**
         * The version number of this document.
         *
         * @var int<-2147483648, 2147483647>
         */
        public readonly int $version,
        string $uri,
    ) {
        $this->uri = $uri;
    }
}
