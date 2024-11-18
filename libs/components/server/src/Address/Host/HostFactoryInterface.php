<?php

declare(strict_types=1);

namespace Lsp\Server\Address\Host;

interface HostFactoryInterface
{
    /**
     * Creates host instance from the host string.
     */
    public function create(string $host): HostInterface;
}
