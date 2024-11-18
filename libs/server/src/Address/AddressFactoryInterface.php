<?php

declare(strict_types=1);

namespace Lsp\Server\Address;

interface AddressFactoryInterface
{
    /**
     * Creates a new address instance from the given DSN string.
     */
    public function create(string|\Stringable $dsn): AddressInterface;
}
