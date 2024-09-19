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

    public function __construct(string|null $label, bool|null $workDoneProgress)
    {
            $this->label = $label;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}