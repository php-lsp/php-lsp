<?php

declare(strict_types=1);

namespace Lsp\Server\Address\Host;

final class HostFactory implements HostFactoryInterface
{
    public function create(string $host): HostInterface
    {
        if (\str_starts_with($host, '[') && \str_ends_with($host, ']')) {
            $host = \substr($host, 1, -1);
        }

        return match (true) {
            \filter_var($host, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4) !== false
                => $this->createV4($host),
            \filter_var($host, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6) !== false
                => $this->createV6($host),
            default => throw new \InvalidArgumentException(
                message: \sprintf('Could not parse host "%s"', $host),
            ),
        };
    }

    private function createV4(string $host): IPv4
    {
        $binary = \inet_pton($host);

        if ($binary === false || $binary === '') {
            throw new \InvalidArgumentException('Could not convert IPv4 host to binary string');
        }

        return IPv4::fromBinaryString($binary);
    }

    private function createV6(string $host): IPv6
    {
        $binary = \inet_pton($host);

        if ($binary === false || $binary === '') {
            throw new \InvalidArgumentException('Could not convert IPv6 host to binary string');
        }

        return IPv6::fromBinaryString($binary);
    }
}
