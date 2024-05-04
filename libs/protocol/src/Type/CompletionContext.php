<?php

namespace Lsp\Protocol\Type;

/**
 * Contains additional information about the context in which a completion request is triggered.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CompletionContext
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly CompletionTriggerKind $triggerKind,
        public readonly string $triggerCharacter,
    ) {}
}
