<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * How a completion was triggered.
 *
 * @generated 2024-11-14
 */
enum CompletionTriggerKind: int
{
    /**
     * Completion was triggered by typing an identifier (24x7 code complete),
     * manual invocation (e.g Ctrl+Space) or via API.
     *
     * @var int<0, 2147483647>
     */
    case Invoked = 1;
    /**
     * Completion was triggered by a trigger character specified by the
     * `triggerCharacters` properties of the `CompletionRegistrationOptions`.
     *
     * @var int<0, 2147483647>
     */
    case TriggerCharacter = 2;
    /**
     * Completion was re-triggered as current completion list is incomplete.
     *
     * @var int<0, 2147483647>
     */
    case TriggerForIncompleteCompletions = 3;
}
