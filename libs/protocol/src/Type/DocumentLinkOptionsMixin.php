<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentLinkRequest}.
 *
 * @generated 2024-09-21
 */
trait DocumentLinkOptionsMixin
{
    use WorkDoneProgressOptionsMixin;
    /**
     * Document links have a resolve provider as well.
     *
     * @readonly
     */
    public ?bool $resolveProvider = null;
}
