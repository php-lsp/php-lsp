<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\Address\AddressInterface;
use Lsp\Server\Driver\ConnectionDriverInterface;

abstract class ReactConnectionDriver implements ConnectionDriverInterface
{
    public function __construct(
        protected readonly AddressInterface $address,
    ) {}

    public function getAddress(): AddressInterface
    {
        return $this->address;
    }
}
