<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents a JSON object map
 * (e.g. `interface Map<K extends string | integer, V> { [key: K] => V; }`).
 */
final class MetaMapType extends MetaType
{
    public function __construct(
        public MetaKeyTypeInterface $key,
        public MetaTypeInterface $value,
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
        $key = MetaType::fromArray($data['key']);

        // @phpstan-ignore-next-line
        $value = MetaType::fromArray($data['value']);

        if (!$key instanceof MetaKeyTypeInterface) {
            throw new \InvalidArgumentException('Invalid key type');
        }

        return new self($key, $value);
    }
}
