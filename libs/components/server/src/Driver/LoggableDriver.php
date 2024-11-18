<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

use Psr\Log\LoggerInterface;

final class LoggableDriver implements DriverInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly DriverInterface $delegate,
    ) {}

    public function create(\Stringable|string $dsn): ServerDriverInterface
    {
        return new LoggableServerDriver(
            logger: $this->logger,
            delegate: $this->delegate->create($dsn),
        );
    }

    public function stop(): void
    {
        $this->delegate->stop();
    }
}
