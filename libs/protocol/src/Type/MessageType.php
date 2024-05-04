<?php

namespace Lsp\Protocol\Type;

/**
 * The message type
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum MessageType: int
{
    /**
     * An error message.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Error = 1;

    /**
     * A warning message.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Warning = 2;

    /**
     * An information message.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Info = 3;

    /**
     * A log message.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Log = 4;

    /**
     * A debug message.
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     */
    case Debug = 5;
}
