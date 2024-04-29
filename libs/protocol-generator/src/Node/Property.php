<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents an object property.
 */
final class Property extends Definition
{
    /**
     * @param non-empty-string $name The property name.
     * @param TypeInterface $type The type of the property.
     * @param bool|null $optional Whether the property is optional. If omitted,
     *        the property is mandatory.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        property is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed property. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the property is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public TypeInterface $type,
        public ?bool $optional,
        ?string $documentation,
        ?string $since,
        ?bool $proposed,
        ?string $deprecated,
    ) {
        parent::__construct(
            documentation: $documentation,
            since: $since,
            proposed: $proposed,
            deprecated: $deprecated,
        );
    }

    public function getSubNodeNames(): array
    {
        return ['type'];
    }

    /**
     * @param array{
     *     name: non-empty-string,
     *     type: array<array-key, mixed>,
     *     optional?: bool,
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
            optional: $data['optional'] ?? null,
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
