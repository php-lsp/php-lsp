<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
class WorkspaceFoldersInitializeParams
{
    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<WorkspaceFolder>|null $workspaceFolders
     */
    public function __construct(array|null $workspaceFolders)
    {
        $this->workspaceFolders = $workspaceFolders;
    }
}
