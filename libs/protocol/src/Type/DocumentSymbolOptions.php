<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentSymbolRequest}.
 *
 * @generated
 */
class DocumentSymbolOptions
{
    use DocumentSymbolOptionsMixin;

    /**
     * @generated
     */
    public function __construct(string $label, bool $workDoneProgress)
    {
        $this->label = $label;

        $this->workDoneProgress = $workDoneProgress;
    }
}
