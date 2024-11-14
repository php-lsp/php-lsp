<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Contains additional information about the context in which a completion
 * request is triggered.
 *
 * @generated 2024-11-14
 */
final class CompletionContext
{
    public function __construct(
        /**
         * How the completion was triggered.
         */
        public readonly CompletionTriggerKind $triggerKind,
        /**
         * The trigger character (a single character) that has trigger code
         * complete.
         * Is undefined if `triggerKind !==
         * CompletionTriggerKind.TriggerCharacter`.
         */
        public readonly ?string $triggerCharacter = null,
    ) {}
}
