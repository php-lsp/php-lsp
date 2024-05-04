<?php

namespace Lsp\Protocol\Type;

/**
 * A text document identifier to optionally denote a specific version of a text document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class OptionalVersionedTextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param int<-2147483648, 2147483647>|null $version
     */
    final public function __construct(
        public readonly int|null $version,
        string $uri,
    ) {
        $this->uri = $uri;
    }
}
