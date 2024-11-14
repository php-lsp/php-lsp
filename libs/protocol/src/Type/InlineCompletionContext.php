<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Provides information about the context in which an inline completion was
 * requested.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-11-14
 */
final class InlineCompletionContext
{
    public function __construct(
        /**
         * Describes how the inline completion was triggered.
         */
        public readonly InlineCompletionTriggerKind $triggerKind,
        /**
         * Provides information about the currently selected item in the
         * autocomplete widget if it is visible.
         */
        public readonly ?SelectedCompletionInfo $selectedCompletionInfo = null,
    ) {}
}
