<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Server\EstablishedClientInterface;

class FailureResponseReceived extends ResponseReceived
{
    /**
     * @param FailureResponseInterface<mixed, mixed> $response
     */
    public function __construct(
        FailureResponseInterface $response,
        EstablishedClientInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}
