<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * When the RPC call is made, the Server MUST reply with a
 * {@see ResponseInterface}, except for in the case of
 * {@see NotificationInterface}.
 *
 * The {@see ResponseInterface} is expressed as a single Object, with "id".
 *
 * @template TIdentifier of mixed
 * @template-extends IdentifiableInterface<TIdentifier>
 */
interface ResponseInterface extends
    MessageInterface,
    IdentifiableInterface {}
