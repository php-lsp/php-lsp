<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentFormattingOptions
{
    use DocumentFormattingOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
