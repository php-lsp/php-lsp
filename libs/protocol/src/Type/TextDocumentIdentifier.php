<?php

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 *
 * @generated
 */
class TextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @generated
     * @param non-empty-string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }
}
