<?php

namespace Lsp\Protocol\Type;

/**
 * The message type
 *
 * @generated
 */
enum MessageType: int
{
    /**
     * An error message.
     *
     * @generated
     */
    case Error = 1;

    /**
     * A warning message.
     *
     * @generated
     */
    case Warning = 2;

    /**
     * An information message.
     *
     * @generated
     */
    case Info = 3;

    /**
     * A log message.
     *
     * @generated
     */
    case Log = 4;

    /**
     * A debug message.
     *
     * @generated
     * @since 3.18.0
     */
    case Debug = 5;
}