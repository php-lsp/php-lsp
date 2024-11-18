<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

use Lsp\Contracts\Server\AddressInterface;
use Psr\Log\LoggerInterface;

final class LoggableServerDriver implements ServerDriverInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly ServerDriverInterface $delegate,
    ) {}

    public function getAddress(): AddressInterface
    {
        return $this->delegate->getAddress();
    }

    public function onEstablished(\Closure $then): void
    {
        $this->delegate->onEstablished(function (ConnectionDriverInterface $connection) use ($then): void {
            $then(new LoggableConnectionDriver(
                logger: $this->logger,
                delegate: $connection,
            ));
        });
    }

    public function close(): void
    {
        $this->delegate->close();
    }
}
