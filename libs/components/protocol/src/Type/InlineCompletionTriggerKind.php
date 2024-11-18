<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describes how an {@link InlineCompletionItemProvider inline completion
 * provider} was triggered.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 */
enum InlineCompletionTriggerKind: int
{
    /**
     * Completion was triggered explicitly by a user gesture.
     */
    case Invoked = 1;
    /**
     * Completion was triggered automatically while editing.
     */
    case Automatic = 2;
}
