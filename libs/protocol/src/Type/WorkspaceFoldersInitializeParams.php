<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class WorkspaceFoldersInitializeParams
{
    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @param list<WorkspaceFolder>|null $workspaceFolders The workspace folders
     *        configured in the client when the server starts.
     *
     *        This property is only available if the client supports workspace folders.
     *        It can be `null` if the client supports workspace folders but none are
     *        configured.
     */
    public function __construct(?array $workspaceFolders = null)
    {
        $this->workspaceFolders = $workspaceFolders;
    }
}
