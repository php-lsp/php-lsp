<?php

namespace Lsp\Protocol\Type;

/**
 * The change text document notification's parameters.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidChangeTextDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<object> $contentChanges
     */
    final public function __construct(
        public readonly VersionedTextDocumentIdentifier $textDocument,
        public readonly array $contentChanges,
    ) {}
}
