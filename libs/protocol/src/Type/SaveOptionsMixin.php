<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Save options.
 *
 * @generated 2024-11-14
 */
trait SaveOptionsMixin
{
    /**
     * The client is supposed to include the content on save.
     *
     * @readonly
     */
    public ?bool $includeText = null;
}
