<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\Address\AddressInterface;
use Lsp\Server\Address\TcpNetworkAddress;
use Lsp\Server\ListenedServerInterface;
use Lsp\Server\ServerPool;
use Psr\Log\LoggerInterface;

final class ReactServerPool extends ServerPool
{
    public function __construct(
        private readonly ReactServerConfiguration $config,
        private readonly ?LoggerInterface $logger = null,
    ) {
        parent::__construct($this->config->addresses);
    }

    protected function create(AddressInterface $address): ListenedServerInterface
    {
        return match (true) {
            $address instanceof TcpNetworkAddress => new ReactTcpListenedServer(
                config: $this->config,
                pool: $this,
                address: $address,
                logger: $this->logger,
            ),
            default => throw new \InvalidArgumentException('Unsupported connection type'),
        };
    }

    public function stop(): void
    {
        $this->config->loop->stop();
    }
}
