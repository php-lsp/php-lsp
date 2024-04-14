<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory;

use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Rpc\Message\Factory\Exception\IdExceptionInterface;
use Lsp\Rpc\Message\Factory\IdFactory\GeneratorInterface;
use Lsp\Rpc\Message\Factory\IdFactory\Int32Generator;
use Lsp\Rpc\Message\Factory\IdFactory\Int64Generator;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Rpc\Message\Notification;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Rpc\Message\Request;
use Lsp\Contracts\Rpc\Message\RequestInterface;

final class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var GeneratorInterface<mixed>
     */
    private readonly GeneratorInterface $id;

    /**
     * @param GeneratorInterface<mixed>|null $id
     */
    public function __construct(GeneratorInterface $id = null)
    {
        $this->id = $this->createIdGenerator($id);
    }

    /**
     * @param GeneratorInterface<mixed>|null $id
     * @return GeneratorInterface<mixed>
     */
    private function createIdGenerator(?GeneratorInterface $id): GeneratorInterface
    {
        if ($id instanceof GeneratorInterface) {
            return $id;
        }

        if (\PHP_INT_SIZE === 8) {
            // @phpstan-ignore-next-line Int64Generator is a subtype of GeneratorInterface
            return new Int64Generator();
        }

        // @phpstan-ignore-next-line Int32Generator is a subtype of GeneratorInterface
        return new Int32Generator();
    }

    /**
     * {@inheritDoc}
     *
     * @throws IdExceptionInterface
     */
    public function createRequest(string $method, array $parameters = [], IdInterface $id = null): RequestInterface
    {
        return new Request($id ?? $this->id->nextId(), $method, $parameters);
    }

    public function createNotification(string $method, array $parameters = []): NotificationInterface
    {
        return new Notification($method, $parameters);
    }
}
