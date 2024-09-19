<?php

namespace Lsp\Protocol\Type;

/**
 * A text edit applicable to a text document.
 *
 * @generated
 */
class TextEdit
{
    use TextEditMixin;

    public function __construct(Range $range, string $newText)
    {
            $this->range = $range;
    
            $this->newText = $newText;
    }
}