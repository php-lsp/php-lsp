<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Server\EstablishedClientInterface;

class ResponseSent extends MessageSent
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
