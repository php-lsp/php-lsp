<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class WorkspaceFoldersInitializeParams
{
    use WorkspaceFoldersInitializeParamsMixin;

    /**
     * @param list<WorkspaceFolder>|null $workspaceFolders
     */
    function __construct(array|null $workspaceFolders)
    {
            $this->workspaceFolders = $workspaceFolders;
    }
}