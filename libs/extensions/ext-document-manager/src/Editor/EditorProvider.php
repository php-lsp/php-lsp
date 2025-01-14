<?php

declare(strict_types=1);

namespace Lsp\Extension\DocumentManager\Editor;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Server\ConnectionProviderInterface;

final class EditorProvider implements EditorProviderInterface
{
    /**
     * @var \WeakMap<ConnectionInterface, Editor>
     */
    private readonly \WeakMap $editors;

    public function __construct(
        private readonly ConnectionProviderInterface $connections,
    ) {
        $this->editors = new \WeakMap();
    }

    public function getEditor(MessageInterface $message): ?EditorInterface
    {
        $connection = $this->connections->getConnection($message);

        if ($connection === null) {
            return null;
        }

        // @phpstan-ignore-next-line : PHPStan false-positive
        return $this->editors[$connection] ??= new Editor();
    }
}
