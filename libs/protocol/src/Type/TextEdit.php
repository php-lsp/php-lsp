<?php

namespace Lsp\Protocol\Type;

/**
 * A text edit applicable to a text document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class TextEdit
{
    use TextEditMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(Range $range, string $newText)
    {
        $this->range = $range;

        $this->newText = $newText;
    }
}
