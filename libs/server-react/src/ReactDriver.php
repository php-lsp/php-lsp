<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\DriverInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Server\React\Server\ReactTcpServer;
use React\EventLoop\LoopInterface;

final class ReactDriver implements DriverInterface
{
    /**
     * @var array<non-empty-string, ServerInterface>
     */
    private array $connections = [];

    /**
     * @param DecoderInterface<MessageInterface> $decoder
     * @param EncoderInterface<MessageInterface> $encoder
     */
    public function __construct(
        private readonly LoopInterface $loop,
        private readonly DecoderInterface $decoder,
        private readonly EncoderInterface $encoder,
        private readonly DispatcherInterface $dispatcher,
    ) {}

    public function create(string $dsn): ServerInterface
    {
        return $this->connections[$dsn] ??= $this->createNewServer($dsn);
    }

    private function createNewServer(string $dsn): ServerInterface
    {
        $info = \parse_url($dsn);

        if ($info === false) {
            throw new \InvalidArgumentException('Invalid connection DSN');
        }

        $info['scheme'] ??= 'tcp';

        /** @var non-empty-string $dsn */
        return match (\strtolower($info['scheme'])) {
            'tcp' => new ReactTcpServer(
                driver: $this,
                dsn: $dsn,
                loop: $this->loop,
                decoder: $this->decoder,
                encoder: $this->encoder,
                dispatcher: $this->dispatcher,
            ),
            default => throw new \InvalidArgumentException('Unsupported connection type'),
        };
    }

    public function run(): void
    {
        $this->loop->run();
    }

    public function stop(): void
    {
        $this->loop->stop();
    }
}
