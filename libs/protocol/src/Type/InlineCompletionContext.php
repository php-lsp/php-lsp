<?php

namespace Lsp\Protocol\Type;

/**
 * Provides information about the context in which an inline completion was requested.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionContext
{
    final public function __construct(
        public readonly InlineCompletionTriggerKind $triggerKind,
        public readonly SelectedCompletionInfo $selectedCompletionInfo,
    ) {}
}