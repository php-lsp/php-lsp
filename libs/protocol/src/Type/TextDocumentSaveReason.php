<?php

namespace Lsp\Protocol\Type;

/**
 * Represents reasons why a text document is saved.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum TextDocumentSaveReason: int
{
    /**
     * Manually triggered, e.g. by the user pressing save, by starting debugging,
     * or by an API call.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Manual = 1;

    /**
     * Automatic after a delay.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case AfterDelay = 2;

    /**
     * When the editor lost focus.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case FocusOut = 3;
}
