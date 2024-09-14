<?php

namespace Lsp\Protocol\Type;

/**
 * How a signature help was triggered.
 *
 * @generated
 *
 * @since 3.15.0
 */
enum SignatureHelpTriggerKind: int
{
    /**
     * Signature help was invoked manually by the user or by a command.
     *
     * @generated
     */
    case Invoked = 1;

    /**
     * Signature help was triggered by a trigger character.
     *
     * @generated
     */
    case TriggerCharacter = 2;

    /**
     * Signature help was triggered by the cursor moving or by the document content changing.
     *
     * @generated
     */
    case ContentChange = 3;
}
