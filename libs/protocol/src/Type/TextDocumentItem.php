<?php

namespace Lsp\Protocol\Type;

/**
 * An item to transfer a text document from the client to the
 * server.
 *
 * @generated
 */
final class TextDocumentItem
{
    /**
     * @param non-empty-string $uri
     * @param int<-2147483648, 2147483647> $version
     */
    final public function __construct(
        public readonly string $uri,
        public readonly string $languageId,
        public readonly int $version,
        public readonly string $text,
    ) {}
}