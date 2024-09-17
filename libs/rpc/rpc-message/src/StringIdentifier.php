<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\IdInterface;

/**
 * @template-implements IdInterface<non-empty-string>
 */
final class StringIdentifier implements IdInterface
{
    /**
     * @param non-empty-string $value
     */
    public function __construct(
        private readonly string $value,
    ) {
        /** @phpstan-ignore-next-line : Additional assertion */
        assert($value !== '', 'String identifier cannot be empty');
    }

    public function toPrimitive(): string
    {
        return $this->value;
    }

    public function equals(IdInterface $id): bool
    {
        return $id === $this
            || ($id instanceof self && $id->value === $this->value)
            || $this->value === (string) $id;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
