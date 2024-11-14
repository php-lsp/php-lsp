<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Server\EstablishedClientInterface;

class SuccessfulResponseReceived extends ResponseReceived
{
    /**
     * @param SuccessfulResponseInterface<mixed, mixed> $response
     */
    public function __construct(
        SuccessfulResponseInterface $response,
        EstablishedClientInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}
