<?php

namespace Lsp\Protocol;

/**
 * The message type
 */
enum MessageType: int
{
    /**
     * An error message.
     */
    case Error = 1;

    /**
     * A warning message.
     */
    case Warning = 2;

    /**
     * An information message.
     */
    case Info = 3;

    /**
     * A log message.
     */
    case Log = 4;

    /**
     * A debug message.
     *
     * @since 3.18.0
     */
    case Debug = 5;
}
