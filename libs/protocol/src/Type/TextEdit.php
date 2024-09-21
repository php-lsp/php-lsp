<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A text edit applicable to a text document.
 *
 * @generated 2024-09-21
 */
final class TextEdit
{
    use TextEditMixin;

    /**
     * @param Range $range The range of the text document to be manipulated. To
     *        insert text into a document create a range where start === end.
     * @param string $newText The string to be inserted. For delete operations
     *        use an empty string.
     */
    public function __construct(Range $range, string $newText)
    {
        $this->range = $range;
        $this->newText = $newText;
    }
}
