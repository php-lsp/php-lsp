<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\Factory\Exception\IdNotSupportedException;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\StringIdentifier;

final class IdFactory implements IdFactoryInterface
{
    public function create(mixed $id = null): IdInterface
    {
        if ($id instanceof \Stringable) {
            $id = (string) $id;
        }

        // @phpstan-ignore-next-line : This implementation of generic output is correct.
        return match (true) {
            $id === null,
            $id === '' => new EmptyIdentifier(),
            \is_int($id) => new IntIdentifier($id),
            // @phpstan-ignore-next-line : Empty identifier already covered.
            \is_string($id) => new StringIdentifier($id),
            default => throw IdNotSupportedException::fromInvalidPlatform(
                expected: 'int|string|null',
                actual: \get_debug_type($id),
            ),
        };
    }
}
