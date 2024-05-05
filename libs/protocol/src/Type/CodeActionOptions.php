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
     * @param list<CodeActionKind> $codeActionKinds
     */
    public function __construct(array $codeActionKinds, bool $resolveProvider, bool $workDoneProgress)
    {
        $this->codeActionKinds = $codeActionKinds;

        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
