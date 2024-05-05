<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentHighlightRequest}.
 *
 * @generated
 */
class DocumentHighlightOptions
{
    use DocumentHighlightOptionsMixin;

    /**
     * @generated
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
