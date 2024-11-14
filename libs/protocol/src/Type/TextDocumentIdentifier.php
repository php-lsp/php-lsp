<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 *
 * @generated 2024-11-14
 */
final class TextDocumentIdentifier
{
    use TextDocumentIdentifierMixin;

    /**
     * @param non-empty-string $uri the text document's uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }
}
