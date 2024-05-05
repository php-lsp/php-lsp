<?php

namespace Lsp\Protocol\Type;

/**
 * The change text document notification's parameters.
 *
 * @generated
 */
final class DidChangeTextDocumentParams
{
    /**
     * @generated
     * @param list<object> $contentChanges
     */
    final public function __construct(
        public readonly VersionedTextDocumentIdentifier $textDocument,
        public readonly array $contentChanges,
    ) {}
}
