<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentFormattingRequest}.
 *
 * @generated
 */
class DocumentFormattingOptions
{
    use DocumentFormattingOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
