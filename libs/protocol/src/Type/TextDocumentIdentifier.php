<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 */
final class TextDocumentIdentifier
{
    public function __construct(
        /**
         * The text document's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
    ) {}
}
