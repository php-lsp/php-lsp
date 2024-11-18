<?php

declare(strict_types=1);

namespace Lsp\Server\Address;

use Lsp\Contracts\Server\AddressInterface;
use Lsp\Server\Address\Host\HostFactory;
use Lsp\Server\Address\Host\HostFactoryInterface;

/**
 * @phpstan-type DsnAsArrayType array{
 *     scheme: non-empty-string,
 *     host?: non-empty-string,
 *     port?: int<0, 65535>,
 *     user?: non-empty-string,
 *     pass?: non-empty-string,
 *     query?: non-empty-string,
 *     path?: non-empty-string,
 *     fragment?: non-empty-string
 * }
 */
final class AddressFactory implements AddressFactoryInterface
{
    private const DEFAULT_SCHEME = 'tcp';

    public function __construct(
        private readonly HostFactoryInterface $hosts = new HostFactory(),
    ) {}

    /**
     * @phpstan-return DsnAsArrayType
     */
    private function parse(string $dsn): array
    {
        /** @var DsnAsArrayType */
        return [
            'scheme' => self::DEFAULT_SCHEME,
            ...((array) \parse_url($dsn)),
        ];
    }

    public function create(string|\Stringable $dsn): AddressInterface
    {
        $parts = $this->parse((string) $dsn);

        return match (\strtolower($parts['scheme'])) {
            'tcp' => $this->createTcp($parts),
            'udp' => $this->createUdp($parts),
            default => throw new \InvalidArgumentException(\sprintf(
                'Unsupported dsn scheme "%s"',
                $parts['scheme'],
            )),
        };
    }

    /**
     * @phpstan-param DsnAsArrayType $parts
     */
    private function createTcp(array $parts): TcpNetworkAddress
    {
        return new TcpNetworkAddress(
            scheme: \strtolower($parts['scheme']),
            host: $this->hosts->create($parts['host'] ?? '127.0.0.1'),
            port: $parts['port'] ?? 0,
        );
    }

    /**
     * @phpstan-param DsnAsArrayType $parts
     */
    private function createUdp(array $parts): UdpNetworkAddress
    {
        return new UdpNetworkAddress(
            scheme: \strtolower($parts['scheme']),
            host: $this->hosts->create($parts['host'] ?? '127.0.0.1'),
            port: $parts['port'] ?? 0,
        );
    }
}
