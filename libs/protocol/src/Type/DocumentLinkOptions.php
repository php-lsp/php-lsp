<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link DocumentLinkRequest}.
 *
 * @generated
 */
class DocumentLinkOptions
{
    use DocumentLinkOptionsMixin;

    public function __construct(bool|null $resolveProvider, bool|null $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}