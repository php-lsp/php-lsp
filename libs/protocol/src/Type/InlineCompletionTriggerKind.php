<?php

namespace Lsp\Protocol\Type;

/**
 * Describes how an {@link InlineCompletionItemProvider inline completion provider} was triggered.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
enum InlineCompletionTriggerKind: int
{
    /**
     * Completion was triggered explicitly by a user gesture.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Invoked = 0;

    /**
     * Completion was triggered automatically while editing.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Automatic = 1;
}
