<?php

namespace Lsp\Protocol\Type;

/**
 * Save options.
 *
 * @generated
 */
class SaveOptions
{
    use SaveOptionsMixin;

    public function __construct(bool $includeText)
    {
        $this->includeText = $includeText;
    }
}
