<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class NotebookDocumentChangeEventCellsTextContent
{
    public function __construct(
        public readonly VersionedTextDocumentIdentifier $document,
        /**
         * @var list<object{text: string}>
         */
        public readonly array $changes = [],
    ) {}
}
