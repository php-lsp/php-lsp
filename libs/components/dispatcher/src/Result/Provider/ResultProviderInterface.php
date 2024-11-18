<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Provider;

interface ResultProviderInterface
{
    public function getResult(mixed $value): mixed;
}
