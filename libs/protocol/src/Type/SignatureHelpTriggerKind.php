<?php

namespace Lsp\Protocol\Type;

/**
 * How a signature help was triggered.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.15.0
 */
enum SignatureHelpTriggerKind: int
{
    /**
     * Signature help was invoked manually by the user or by a command.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Invoked = 1;

    /**
     * Signature help was triggered by a trigger character.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case TriggerCharacter = 2;

    /**
     * Signature help was triggered by the cursor moving or by the document content changing.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ContentChange = 3;
}
