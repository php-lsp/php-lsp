<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Defines a type alias. (e.g. `type Definition = Location | LocationLink`).
 */
final class TypeAlias extends Node
{
    /**
     * @param non-empty-string $name The name of the type alias.
     * @param TypeInterface $type The aliased type.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed type alias.
     *        If omitted, the type alias is final.
     * @param non-empty-string|null $deprecated Whether the type alias is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public TypeInterface $type,
        public ?string $documentation,
        public ?string $since,
        public ?bool $proposed,
        public ?string $deprecated,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['type'];
    }

    /**
     * @param array{
     *     name: non-empty-string,
     *     type: array<array-key, mixed>,
     *     documentation?: non-empty-string,
     *     since?: non-empty-string,
     *     proposed?: bool,
     *     deprecated?: non-empty-string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            type: Type::fromArray($data['type']),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
