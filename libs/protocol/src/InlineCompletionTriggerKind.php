<?php

namespace Lsp\Protocol;

/**
 * Describes how an {@link InlineCompletionItemProvider inline completion provider} was triggered.
 *
 * @since 3.18.0
 * @internal This enum is not standardized
 */
enum InlineCompletionTriggerKind: int
{
    /**
     * Completion was triggered explicitly by a user gesture.
     */
    case Invoked = 0;

    /**
     * Completion was triggered automatically while editing.
     */
    case Automatic = 1;
}