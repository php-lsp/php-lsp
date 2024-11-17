<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class TextDocumentContentChangeWholeDocument
{
    public function __construct(
        /**
         * The new text of the whole document.
         */
        public readonly string $text,
    ) {}
}
