<?php

namespace Lsp\Protocol\Type;

/**
 * Predefined error codes.
 *
 * @generated
 */
enum ErrorCodes: int
{
    /**
     * @generated
     */
    case ParseError = -32700;

    /**
     * @generated
     */
    case InvalidRequest = -32600;

    /**
     * @generated
     */
    case MethodNotFound = -32601;

    /**
     * @generated
     */
    case InvalidParams = -32602;

    /**
     * @generated
     */
    case InternalError = -32603;

    /**
     * Error code indicating that a server received a notification or
     * request before the server has received the `initialize` request.
     *
     * @generated
     */
    case ServerNotInitialized = -32002;

    /**
     * @generated
     */
    case UnknownErrorCode = -32001;
}