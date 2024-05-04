<?php

namespace Lsp\Protocol\Type;

/**
 * The reason why code actions were requested.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
enum CodeActionTriggerKind: int
{
    /**
     * Code actions were explicitly requested by the user or by an extension.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Invoked = 1;

    /**
     * Code actions were requested automatically.
     *
     * This typically happens when current selection in a file changes, but can
     * also be triggered when file content changes.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Automatic = 2;
}
