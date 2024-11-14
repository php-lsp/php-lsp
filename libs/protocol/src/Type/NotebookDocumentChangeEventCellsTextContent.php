<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class NotebookDocumentChangeEventCellsTextContent
{
    public function __construct(
        public readonly VersionedTextDocumentIdentifier $document,
        /**
         * @var list<DidChangeTextDocumentParamsContentChanges>
         */
        public readonly array $changes = [],
    ) {}
}
