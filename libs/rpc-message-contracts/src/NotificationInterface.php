<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * A {@see NotificationInterface} is a {@see RequestInterface} object without
 * an "id" member. A {@see RequestInterface} object that is
 * a {@see NotificationInterface} signifies the Client's lack of interest in
 * the corresponding {@see ResponseInterface} object, and as such
 * no {@see ResponseInterface} object needs to be returned to the client. The
 * Server MUST NOT reply to a {@see NotificationInterface}, including those
 * that are within a batch request.
 *
 * The {@see NotificationInterface} is not confirmable by definition, since
 * they do not have a {@see ResponseInterface} object to be returned. As such,
 * the Client would not be aware of any errors (like e.g. "Invalid params",
 * "Internal error").
 *
 * @link https://www.jsonrpc.org/specification#notification
 */
interface NotificationInterface extends MessageInterface
{
    /**
     * A String containing the name of the method to be invoked. Method names
     * that begin with the word RPC followed by a period character
     * (U+002E or ASCII 46) are reserved for rpc-internal methods and
     * extensions and MUST NOT be used for anything else.
     *
     * @return non-empty-string
     */
    public function getMethod(): string;

    /**
     * If present, parameters for the RPC call MUST be provided as a Structured
     * value. Either by-position through an {@see array} or by-name through
     * an {@see object}.
     *
     *  - by-position: params MUST be an {@see array}, containing the values in
     *    the Server expected order.
     *  - by-name: params MUST be an {@see object}, with member names that
     *    match the Server expected parameter names. The absence of expected
     *    names MAY result in an error being generated. The names MUST match
     *    exactly, including case, to the method's expected parameters.
     *
     * @return array<array-key, mixed>
     */
    public function getParameters(): array;
}
