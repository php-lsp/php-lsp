<?php

namespace Lsp\Protocol\Type;

/**
 * Save options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class SaveOptions
{
    use SaveOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $includeText)
    {
        $this->includeText = $includeText;
    }
}
