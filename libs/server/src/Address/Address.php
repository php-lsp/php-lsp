<?php

declare(strict_types=1);

namespace Lsp\Server\Address;

abstract class Address implements AddressInterface
{
    /**
     * @var non-empty-lowercase-string
     */
    protected readonly string $scheme;

    /**
     * @param non-empty-string $scheme
     */
    public function __construct(string $scheme)
    {
        $this->scheme = \strtolower($scheme);
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function __toString(): string
    {
        return \sprintf('%s://', $this->scheme);
    }
}
