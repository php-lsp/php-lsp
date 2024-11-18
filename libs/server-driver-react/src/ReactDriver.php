<?php

declare(strict_types=1);

namespace Lsp\Server\Driver\React;

use Lsp\Contracts\Server\AddressInterface;
use Lsp\Server\Address\AddressFactory;
use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Address\TcpNetworkAddress;
use Lsp\Server\Driver\DriverInterface;
use React\EventLoop\LoopInterface;

final class ReactDriver implements DriverInterface
{
    public function __construct(
        private readonly LoopInterface $loop,
        private readonly AddressFactoryInterface $addresses = new AddressFactory(),
    ) {}

    private function createAddress(string|\Stringable $dsn): AddressInterface
    {
        if ($dsn instanceof AddressInterface) {
            return $dsn;
        }

        return $this->addresses->create($dsn);
    }

    public function create(string|\Stringable $dsn): ReactServerDriver
    {
        $address = $this->createAddress($dsn);

        return match (true) {
            $address instanceof TcpNetworkAddress => new ReactTcpServerDriver(
                loop: $this->loop,
                address: $address,
                addresses: $this->addresses,
            ),
            default => throw new \InvalidArgumentException(\sprintf(
                'Unsupported connection type "%s"',
                (string) $address,
            )),
        };
    }

    public function stop(): void
    {
        $this->loop->stop();
    }
}
