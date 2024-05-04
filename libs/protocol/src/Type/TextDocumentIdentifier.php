<?php

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class TextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }
}
