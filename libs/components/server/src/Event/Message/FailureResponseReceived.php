<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Message;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class FailureResponseReceived extends ResponseReceived
{
    /**
     * @param FailureResponseInterface<mixed, mixed> $response
     */
    public function __construct(
        FailureResponseInterface $response,
        ConnectionInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}
