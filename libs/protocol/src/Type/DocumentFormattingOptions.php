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

    /**
     * @generated
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
