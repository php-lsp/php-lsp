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

    public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
