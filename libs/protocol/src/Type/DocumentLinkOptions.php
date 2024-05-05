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

    function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}