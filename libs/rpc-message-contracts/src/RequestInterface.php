<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * A rpc call is represented by sending a request object to a server.
 *
 * @template TIdentifier of mixed
 *
 * @template-extends IdentifiableInterface<TIdentifier>
 */
interface RequestInterface extends
    NotificationInterface,
    IdentifiableInterface {}
