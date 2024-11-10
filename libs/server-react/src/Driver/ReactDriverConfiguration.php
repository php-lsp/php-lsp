<?php

declare(strict_types=1);

namespace Lsp\Server\React\Driver;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use React\EventLoop\LoopInterface;

/**
 * @internal this is an internal library class, please do not use it in your code.
 * @psalm-internal Lsp\Server\React
 */
final class ReactDriverConfiguration
{
    /**
     * @param DecoderInterface<MessageInterface> $decoder
     * @param EncoderInterface<MessageInterface> $encoder
     */
    public function __construct(
        public readonly LoopInterface $loop,
        public readonly DecoderInterface $decoder,
        public readonly EncoderInterface $encoder,
        public readonly DispatcherInterface $dispatcher,
    ) {}
}
