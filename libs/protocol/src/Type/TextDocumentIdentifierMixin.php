<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 *
 * @generated 2024-09-21
 */
trait TextDocumentIdentifierMixin
{
    /**
     * The text document's uri.
     *
     * @var non-empty-string
     */
    public readonly string $uri;
}
