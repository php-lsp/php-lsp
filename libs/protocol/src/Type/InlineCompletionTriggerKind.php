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
 *
 * @generated 2024-11-15
 */
enum InlineCompletionTriggerKind: int
{
    /**
     * Completion was triggered explicitly by a user gesture.
     *
     * @var int<0, 2147483647>
     */
    case Invoked = 1;
    /**
     * Completion was triggered automatically while editing.
     *
     * @var int<0, 2147483647>
     */
    case Automatic = 2;
}
