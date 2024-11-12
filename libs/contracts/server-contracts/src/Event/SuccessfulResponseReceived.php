<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Event;

use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class SuccessfulResponseReceived extends ResponseReceived
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
