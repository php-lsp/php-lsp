<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class CodeActionOptions
{
    use CodeActionOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<CodeActionKind> $codeActionKinds
     */
    public function __construct(array $codeActionKinds, bool $resolveProvider, bool $workDoneProgress)
    {
        $this->codeActionKinds = $codeActionKinds;

        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
