<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;

/**
 * @template TIdentifier of mixed
 * @template-implements RequestInterface<TIdentifier>
 */
class Request extends Notification implements RequestInterface
{
    /**
     * @param IdInterface<TIdentifier> $id
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     */
    public function __construct(
        protected readonly IdInterface $id,
        string $method,
        array $parameters = [],
    ) {
        /** @phpstan-ignore-next-line : Additional assertion */
        assert($method !== '', 'Method name cannot be empty');

        parent::__construct($method, $parameters);
    }

    public function getId(): IdInterface
    {
        return $this->id;
    }
}
