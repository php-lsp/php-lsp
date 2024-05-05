<?php

namespace Lsp\Protocol\Type;

/**
 * Contains additional information about the context in which a completion request is triggered.
 *
 * @generated
 */
final class CompletionContext
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly CompletionTriggerKind $triggerKind,
        public readonly string $triggerCharacter,
    ) {}
}
