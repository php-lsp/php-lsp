<?php

declare(strict_types=1);

namespace Lsp\Server\Bridge\React;

use Lsp\Contracts\Server\AddressInterface;
use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Driver\ServerDriverInterface;
use React\EventLoop\LoopInterface;

abstract class ReactServerDriver implements ServerDriverInterface
{
    public function __construct(
        protected readonly LoopInterface $loop,
        protected readonly AddressInterface $address,
        protected readonly AddressFactoryInterface $addresses,
    ) {}

    public function getAddress(): AddressInterface
    {
        return $this->address;
    }
}
