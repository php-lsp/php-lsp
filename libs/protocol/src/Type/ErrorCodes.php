<?php

namespace Lsp\Protocol\Type;

/**
 * Predefined error codes.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum ErrorCodes: int
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ParseError = -32700;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InvalidRequest = -32600;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case MethodNotFound = -32601;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InvalidParams = -32602;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case InternalError = -32603;

    /**
     * Error code indicating that a server received a notification or
     * request before the server has received the `initialize` request.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case ServerNotInitialized = -32002;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    case UnknownErrorCode = -32001;
}
