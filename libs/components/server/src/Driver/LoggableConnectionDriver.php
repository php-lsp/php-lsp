<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

use Lsp\Contracts\Server\AddressInterface;
use Psr\Log\LoggerInterface;

final class LoggableConnectionDriver implements ConnectionDriverInterface
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly ConnectionDriverInterface $delegate,
    ) {
        $this->onData(function (string $data): void {
            $this->logger->debug('[connection][{address}] Reading', [
                'address' => (string) $this->getAddress(),
                'data' => $data,
            ]);
        });

        $this->onError(function (\Throwable $e): void {
            $this->logger->debug('[connection][{address}] Error', [
                'address' => (string) $this->getAddress(),
                'exception' => $e,
            ]);
        });

        $this->onClose(function (): void {
            $this->logger->debug('[connection][{address}] Closing', [
                'address' => (string) $this->getAddress(),
            ]);
        });
    }

    public function getAddress(): AddressInterface
    {
        return $this->delegate->getAddress();
    }

    public function write(string $data): void
    {
        $this->logger->debug('[connection][{address}] Writing', [
            'address' => (string) $this->getAddress(),
            'data' => $data,
        ]);

        $this->delegate->write($data);
    }

    public function onData(\Closure $then): void
    {
        $this->delegate->onData($then);
    }

    public function onError(\Closure $then): void
    {
        $this->delegate->onError($then);
    }

    public function onClose(\Closure $then): void
    {
        $this->delegate->onClose($then);
    }

    public function close(): void
    {
        $this->delegate->close();
    }
}
