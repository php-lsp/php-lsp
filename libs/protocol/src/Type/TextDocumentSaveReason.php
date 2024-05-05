<?php

namespace Lsp\Protocol\Type;

/**
 * Represents reasons why a text document is saved.
 *
 * @generated
 */
enum TextDocumentSaveReason: int
{
    /**
     * Manually triggered, e.g. by the user pressing save, by starting debugging,
     * or by an API call.
     *
     * @generated
     */
    case Manual = 1;

    /**
     * Automatic after a delay.
     *
     * @generated
     */
    case AfterDelay = 2;

    /**
     * When the editor lost focus.
     *
     * @generated
     */
    case FocusOut = 3;
}
