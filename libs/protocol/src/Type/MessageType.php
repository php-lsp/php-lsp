<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The message type.
 *
 * @generated 2024-11-15
 */
enum MessageType: int
{
    /**
     * An error message.
     *
     * @var int<0, 2147483647>
     */
    case Error = 1;
    /**
     * A warning message.
     *
     * @var int<0, 2147483647>
     */
    case Warning = 2;
    /**
     * An information message.
     *
     * @var int<0, 2147483647>
     */
    case Info = 3;
    /**
     * A log message.
     *
     * @var int<0, 2147483647>
     */
    case Log = 4;
    /**
     * A debug message.
     *
     * @since 3.18.0
     *
     * @internal This is a proposed type, which means that the implementation of
     *           this type is not final. Please use this type at your own risk.
     *
     * @var int<0, 2147483647>
     */
    case Debug = 5;
}
