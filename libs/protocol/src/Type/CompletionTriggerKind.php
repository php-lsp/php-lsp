<?php

namespace Lsp\Protocol\Type;

/**
 * How a completion was triggered
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum CompletionTriggerKind: int
{
    /**
     * Completion was triggered by typing an identifier (24x7 code
     * complete), manual invocation (e.g Ctrl+Space) or via API.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Invoked = 1;

    /**
     * Completion was triggered by a trigger character specified by
     * the `triggerCharacters` properties of the `CompletionRegistrationOptions`.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TriggerCharacter = 2;

    /**
     * Completion was re-triggered as current completion list is incomplete
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TriggerForIncompleteCompletions = 3;
}
