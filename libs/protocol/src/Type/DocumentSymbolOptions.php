<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class DocumentSymbolOptions
{
    use DocumentSymbolOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(string $label, bool $workDoneProgress)
    {
        $this->label = $label;

        $this->workDoneProgress = $workDoneProgress;
    }
}
