<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a JSON object map
 * (e.g. `interface Map<K extends string | integer, V> { [key: K] => V; }`).
 */
final class MapType extends Type
{
    public function __construct(
        public KeyTypeInterface $key,
        public TypeInterface $value
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['key', 'value'];
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        $key = Type::fromArray($data['key']);

        // @phpstan-ignore-next-line
        $value = Type::fromArray($data['value']);

        if (!$key instanceof KeyTypeInterface) {
            throw new \InvalidArgumentException('Invalid key type');
        }

        return new self($key, $value);
    }
}
