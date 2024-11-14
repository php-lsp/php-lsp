<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents reasons why a text document is saved.
 *
 * @generated 2024-11-14
 */
enum TextDocumentSaveReason: int
{
    /**
     * Manually triggered, e.g. by the user pressing save, by starting
     * debugging,
     * or by an API call.
     *
     * @var int<0, 2147483647>
     */
    case Manual = 1;
    /**
     * Automatic after a delay.
     *
     * @var int<0, 2147483647>
     */
    case AfterDelay = 2;
    /**
     * When the editor lost focus.
     *
     * @var int<0, 2147483647>
     */
    case FocusOut = 3;
}
