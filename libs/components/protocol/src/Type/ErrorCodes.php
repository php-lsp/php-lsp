<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Predefined error codes.
 */
enum ErrorCodes: int
{
    case ParseError = -32700;
    case InvalidRequest = -32600;
    case MethodNotFound = -32601;
    case InvalidParams = -32602;
    case InternalError = -32603;
    /**
     * Error code indicating that a server received a notification or request
     * before the server has received the `initialize` request.
     */
    case ServerNotInitialized = -32002;
    case UnknownErrorCode = -32001;
}
