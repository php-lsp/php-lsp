<?php

declare(strict_types=1);

namespace Lsp\Server\Address\Host;

abstract class Host implements HostInterface
{
    /**
     * @var non-empty-lowercase-string
     */
    protected readonly string $host;

    /**
     * @param non-empty-string $host
     */
    final public function __construct(string $host)
    {
        $this->host = \strtolower($host);
    }

    /**
     * @api
     */
    public function toBinaryString(): string
    {
        $result = \inet_pton($this->host);

        if ($result === false || $result === '') {
            throw new \UnexpectedValueException(\sprintf(
                'An internal error occurs when converting IP address (%s) to binary string',
                $this->host,
            ));
        }

        return $result;
    }

    public static function fromBinaryString(string $binary): static
    {
        $address = \inet_ntop($binary);

        if ($address === false || $address === '') {
            throw new \InvalidArgumentException('Invalid binary IP address');
        }

        return new static($address);
    }

    public function __toString(): string
    {
        return $this->host;
    }
}
