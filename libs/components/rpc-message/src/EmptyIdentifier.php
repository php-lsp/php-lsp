<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\IdInterface;

/**
 * @template-implements IdInterface<null>
 */
final class EmptyIdentifier implements IdInterface
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function equals(IdInterface $id): bool
    {
        // Is same instance
        return $this === $id
            // Or same class
            || $id::class === self::class
            // Or same value
            || $id->toPrimitive() === null;
    }

    public function toPrimitive(): mixed
    {
        return null;
    }

    public function __toString(): string
    {
        return '';
    }
}
