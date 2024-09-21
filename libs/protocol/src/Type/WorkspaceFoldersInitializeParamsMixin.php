<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
trait WorkspaceFoldersInitializeParamsMixin
{
    /**
     * The workspace folders configured in the client when the server starts.
     *
     * This property is only available if the client supports workspace folders.
     * It can be `null` if the client supports workspace folders but none are
     * configured.
     *
     * @since 3.6.0
     *
     * @var list<WorkspaceFolder>|null
     *
     * @readonly
     */
    public ?array $workspaceFolders = null;
}
