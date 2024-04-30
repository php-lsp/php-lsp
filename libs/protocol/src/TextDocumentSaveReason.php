<?php

namespace Lsp\Protocol;

/**
 * Represents reasons why a text document is saved.
 */
enum TextDocumentSaveReason: int
{
    /**
     * Manually triggered, e.g. by the user pressing save, by starting debugging,
     * or by an API call.
     */
    case Manual = 1;

    /**
     * Automatic after a delay.
     */
    case AfterDelay = 2;

    /**
     * When the editor lost focus.
     */
    case FocusOut = 3;
}
