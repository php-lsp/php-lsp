<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum LSPErrorCodes: int
{
    /**
     * A request failed but it was syntactically correct, e.g the method name
     * was known and the parameters were valid. The error message should contain
     * human readable information about why the request failed.
     *
     * @since 3.17.0
     *
     * @var int<-2147483648, 2147483647>
     */
    case RequestFailed = -32803;
    /**
     * The server cancelled the request. This error code should only be used for
     * requests that explicitly support being server cancellable.
     *
     * @since 3.17.0
     *
     * @var int<-2147483648, 2147483647>
     */
    case ServerCancelled = -32802;
    /**
     * The server detected that the content of a document got modified outside
     * normal conditions. A server should NOT send this error code if it detects
     * a content change in it unprocessed messages. The result even computed on
     * an older state might still be useful for the client.
     *
     * If a client decides that a result is not of any use anymore the client
     * should cancel the request.
     *
     * @var int<-2147483648, 2147483647>
     */
    case ContentModified = -32801;
    /**
     * The client has canceled a request and a server has detected the cancel.
     *
     * @var int<-2147483648, 2147483647>
     */
    case RequestCancelled = -32800;
}
