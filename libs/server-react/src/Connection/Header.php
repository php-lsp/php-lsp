<?php

declare(strict_types=1);

namespace Lsp\Server\React\Connection;

final class Header
{
    public function __construct(
        public readonly string $key,
        public readonly string $value,
    ) {}
}
