<?php

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to denote a specific version of a text document.
 *
 * @generated
 */
final class VersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647> $version
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly int $version,
        string $uri,
    ) {
        $this->uri = $uri;
    }
}
