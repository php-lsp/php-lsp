<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @generated
 */
class CodeActionOptions
{
    use CodeActionOptionsMixin;

    /**
     * @param list<CodeActionKind>|null $codeActionKinds
     */
    public function __construct(array|null $codeActionKinds, bool|null $resolveProvider, bool|null $workDoneProgress)
    {
            $this->codeActionKinds = $codeActionKinds;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}