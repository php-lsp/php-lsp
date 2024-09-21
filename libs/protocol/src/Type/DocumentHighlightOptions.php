<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentHighlightRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentHighlightOptions
{
    use DocumentHighlightOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
