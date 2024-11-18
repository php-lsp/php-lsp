<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Message;

use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class SuccessfulResponseSent extends ResponseSent
{
    /**
     * @param SuccessfulResponseInterface<mixed, mixed> $response
     */
    public function __construct(
        SuccessfulResponseInterface $response,
        ConnectionInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}
