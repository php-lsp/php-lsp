<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class WorkspaceFoldersInitializeParams
{
    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @generated
     * @param list<WorkspaceFolder>|null $workspaceFolders
     */
    public function __construct(array|null $workspaceFolders)
    {
        $this->workspaceFolders = $workspaceFolders;
    }
}
