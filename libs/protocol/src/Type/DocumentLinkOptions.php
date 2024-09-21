<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentLinkRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentLinkOptions
{
    use DocumentLinkOptionsMixin;

    /**
     * @param bool|null $resolveProvider document links have a resolve provider
     *        as well
     */
    public function __construct(?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
