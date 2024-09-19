<?php

namespace Lsp\Protocol\Type;

/**
 * Code Lens provider options of a {@link CodeLensRequest}.
 *
 * @generated
 */
class CodeLensOptions
{
    use CodeLensOptionsMixin;

    public function __construct(bool|null $resolveProvider, bool|null $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}