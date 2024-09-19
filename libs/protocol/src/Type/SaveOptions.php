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

    public function __construct(bool|null $includeText)
    {
            $this->includeText = $includeText;
    }
}