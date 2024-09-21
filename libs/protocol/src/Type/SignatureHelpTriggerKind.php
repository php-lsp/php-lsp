<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * How a signature help was triggered.
 *
 * @since 3.15.0
 *
 * @generated 2024-09-21
 */
enum SignatureHelpTriggerKind: int
{
    /**
     * Signature help was invoked manually by the user or by a command.
     *
     * @var int<0, 2147483647>
     */
    case Invoked = 1;
    /**
     * Signature help was triggered by a trigger character.
     *
     * @var int<0, 2147483647>
     */
    case TriggerCharacter = 2;
    /**
     * Signature help was triggered by the cursor moving or by the document
     * content changing.
     *
     * @var int<0, 2147483647>
     */
    case ContentChange = 3;
}
