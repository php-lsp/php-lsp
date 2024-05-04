<?php

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to denote a specific version of a text document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class VersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<-2147483648, 2147483647> $version
     */
    final public function __construct(
        public readonly int $version,
        string $uri,
    ) {
        $this->uri = $uri;
    }
}
