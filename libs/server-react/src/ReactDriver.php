<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\DriverInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Server\React\Driver\ReactDriverConfiguration;
use React\EventLoop\LoopInterface;

final class ReactDriver implements DriverInterface
{
    /**
     * @var array<non-empty-string, ServerInterface>
     */
    private array $connections = [];

    private readonly ReactDriverConfiguration $config;

    /**
     * @param DecoderInterface<MessageInterface> $decoder
     * @param EncoderInterface<MessageInterface> $encoder
     */
    public function __construct(
        LoopInterface $loop,
        DecoderInterface $decoder,
        EncoderInterface $encoder,
        DispatcherInterface $dispatcher,
    ) {
        $this->config = new ReactDriverConfiguration(
            loop: $loop,
            decoder: $decoder,
            encoder: $encoder,
            dispatcher: $dispatcher,
        );
    }

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
            'tcp' => new ReactTcpServer($this, $this->config, $dsn),
            default => throw new \InvalidArgumentException('Unsupported connection type'),
        };
    }

    public function run(): void
    {
        $this->config->loop->run();
    }

    public function stop(): void
    {
        $this->config->loop->stop();
    }
}
