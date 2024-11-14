<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Server\EstablishedClientInterface;

class ResponseReceived extends MessageReceived
{
    /**
     * @param ResponseInterface<mixed> $response
     */
    public function __construct(
        ResponseInterface $response,
        EstablishedClientInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}
