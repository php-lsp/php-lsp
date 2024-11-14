<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-11-14
 */
final class DocumentSymbolOptions
{
    use DocumentSymbolOptionsMixin;

    /**
     * @param string|null $label a human-readable string that is shown when
     *        multiple outlines trees are shown for the same document
     */
    public function __construct(?string $label = null, ?bool $workDoneProgress = null)
    {
        $this->label = $label;
        $this->workDoneProgress = $workDoneProgress;
    }
}
