<?php

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to optionally denote a specific version of a text document.
 *
 * @generated
 */
final class OptionalVersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647>|null $version
     */
    final public function __construct(
        public readonly int|null $version,
        string $uri,
    ) {
        $this->uri = $uri;
    }
}
