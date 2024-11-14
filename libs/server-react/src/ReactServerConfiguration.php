<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Address\AddressFactory;
use Lsp\Server\Address\AddressFactoryInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use React\EventLoop\LoopInterface;

final class ReactServerConfiguration
{
    public function __construct(
        public readonly LoopInterface $loop,
        public readonly DecoderInterface $decoder,
        public readonly EncoderInterface $encoder,
        public readonly DispatcherInterface $dispatcher,
        public readonly EventDispatcherInterface $events,
        public readonly AddressFactoryInterface $addresses = new AddressFactory(),
    ) {}
}
