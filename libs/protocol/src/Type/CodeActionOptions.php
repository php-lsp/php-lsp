<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @generated 2024-09-21
 */
final class CodeActionOptions
{
    use CodeActionOptionsMixin;

    /**
     * @param list<CodeActionKind>|null $codeActionKinds CodeActionKinds that
     *        this server may return.
     *
     *        The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     *        the server may list out every specific kind they provide.
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for a code action
     */
    public function __construct(?array $codeActionKinds = null, ?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->codeActionKinds = $codeActionKinds;
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
