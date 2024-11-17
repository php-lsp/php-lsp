<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A text edit applicable to a text document.
 */
final class TextEdit
{
    public function __construct(
        /**
         * The range of the text document to be manipulated. To insert text into
         * a document create a range where start === end.
         */
        public readonly Range $range,
        /**
         * The string to be inserted. For delete operations use an empty string.
         */
        public readonly string $newText,
    ) {}
}
