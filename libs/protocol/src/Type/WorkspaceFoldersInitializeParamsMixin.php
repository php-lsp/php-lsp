<?php

namespace Lsp\Protocol\Type;

trait WorkspaceFoldersInitializeParamsMixin
{
    /**
     * The workspace folders configured in the client when the server starts.
     *
     * This property is only available if the client supports workspace folders.
     * It can be `null` if the client supports workspace folders but none are
     * configured.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.6.0
     * @var list<WorkspaceFolder>|null
     */
    public readonly array|null $workspaceFolders;
}
