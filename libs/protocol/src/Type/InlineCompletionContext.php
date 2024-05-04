<?php

namespace Lsp\Protocol\Type;

/**
 * Provides information about the context in which an inline completion was requested.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionContext
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     */
    final public function __construct(
        public readonly InlineCompletionTriggerKind $triggerKind,
        public readonly SelectedCompletionInfo $selectedCompletionInfo,
    ) {}
}
