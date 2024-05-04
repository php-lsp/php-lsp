<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentHighlightRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class DocumentHighlightOptions
{
    use DocumentHighlightOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
