<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\ConnectionInterface;

interface ConnectionProviderInterface
{
    public function getConnection(MessageInterface $message): ?ConnectionInterface;
}
