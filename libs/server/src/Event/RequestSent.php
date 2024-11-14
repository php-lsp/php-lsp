<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Server\EstablishedClientInterface;

class RequestSent extends NotificationSent
{
    /**
     * @param RequestInterface<mixed> $request
     */
    public function __construct(
        RequestInterface $request,
        EstablishedClientInterface $connection,
    ) {
        parent::__construct($request, $connection);
    }
}
