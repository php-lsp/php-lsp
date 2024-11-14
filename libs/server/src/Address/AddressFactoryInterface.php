<?php

declare(strict_types=1);

namespace Lsp\Server\Address;

interface AddressFactoryInterface
{
    /**
     * Creates a new address instance from the given DSN string.
     *
     * @param non-empty-string $dsn
     */
    public function create(string $dsn): AddressInterface;
}
