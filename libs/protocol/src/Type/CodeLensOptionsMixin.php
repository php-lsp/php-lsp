<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Code Lens provider options of a {@link CodeLensRequest}.
 *
 * @generated 2024-09-21
 */
trait CodeLensOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * Code lens has a resolve provider as well.
     *
     * @readonly
     */
    public ?bool $resolveProvider = null;
}
