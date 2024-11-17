<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The message type.
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
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     */
    case Debug = 5;
}
