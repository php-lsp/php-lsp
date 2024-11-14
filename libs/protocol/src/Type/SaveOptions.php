<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Save options.
 *
 * @generated 2024-11-14
 */
final class SaveOptions
{
    use SaveOptionsMixin;

    /**
     * @param bool|null $includeText the client is supposed to include the
     *        content on save
     */
    public function __construct(?bool $includeText = null)
    {
        $this->includeText = $includeText;
    }
}
