<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class DidChangeTextDocumentParamsContentChanges
{
    public function __construct(
        /**
         * The new text of the whole document.
         */
        public readonly string $text,
    ) {}
}
