<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Predefined error codes.
 *
 * @generated 2024-11-15
 */
enum ErrorCodes: int
{
    /**
     * @var int<-2147483648, 2147483647>
     */
    case ParseError = -32700;
    /**
     * @var int<-2147483648, 2147483647>
     */
    case InvalidRequest = -32600;
    /**
     * @var int<-2147483648, 2147483647>
     */
    case MethodNotFound = -32601;
    /**
     * @var int<-2147483648, 2147483647>
     */
    case InvalidParams = -32602;
    /**
     * @var int<-2147483648, 2147483647>
     */
    case InternalError = -32603;
    /**
     * Error code indicating that a server received a notification or request
     * before the server has received the `initialize` request.
     *
     * @var int<-2147483648, 2147483647>
     */
    case ServerNotInitialized = -32002;
    /**
     * @var int<-2147483648, 2147483647>
     */
    case UnknownErrorCode = -32001;
}
