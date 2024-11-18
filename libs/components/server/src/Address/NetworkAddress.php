<?php

declare(strict_types=1);

namespace Lsp\Server\Address;

use Lsp\Server\Address\Host\HostInterface;

abstract class NetworkAddress extends Address
{
    /**
     * @param non-empty-string $scheme
     */
    public function __construct(
        string $scheme,
        /**
         * Network address host representation.
         */
        protected readonly HostInterface $host,
        /**
         * An integer value representing the port of the address.
         *
         * @var int<0, 65535>
         */
        protected readonly int $port,
    ) {
        parent::__construct($scheme);
    }

    /**
     * Returns network address host.
     *
     * @api
     */
    public function getHost(): HostInterface
    {
        return $this->host;
    }

    /**
     * Returns network address port.
     *
     * @return int<0, 65535>
     */
    public function getPort(): int
    {
        return $this->port;
    }

    public function __toString(): string
    {
        return \vsprintf('%s://%s:%d', [
            $this->scheme,
            $this->host,
            $this->port,
        ]);
    }
}
