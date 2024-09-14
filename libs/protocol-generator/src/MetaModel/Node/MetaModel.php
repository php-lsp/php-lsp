<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\TypeInterface;

/**
 * The actual meta model.
 */
final class MetaModel extends Node
{
    /**
     * @param MetaData $metaData additional meta data
     * @param list<Request> $requests the requests
     * @param list<Notification> $notifications the notifications
     * @param list<Structure> $structures the structures
     * @param list<Enumeration> $enumerations the enumerations
     * @param list<TypeAlias> $typeAliases the type aliases
     */
    public function __construct(
        public MetaData $metaData,
        public array $requests,
        public array $notifications,
        public array $structures,
        public array $enumerations,
        public array $typeAliases,
    ) {
        parent::__construct();
    }

    public function findReferenceFromAliases(ReferenceType $ref): ?TypeInterface
    {
        foreach ($this->typeAliases as $alias) {
            if ($alias->name === $ref->name) {
                return $alias->type;
            }
        }

        return null;
    }

    public function findReference(ReferenceType $ref): ?Definition
    {
        foreach ($this->structures as $structure) {
            if ($structure->name === $ref->name) {
                return $structure;
            }
        }

        foreach ($this->enumerations as $enum) {
            if ($enum->name === $ref->name) {
                return $enum;
            }
        }

        return null;
    }

    public function getSubNodeNames(): array
    {
        return ['metaData', 'requests', 'notifications', 'structures', 'enumerations', 'typeAliases'];
    }

    /**
     * @param array{
     *     metaData: array<array-key, mixed>,
     *     requests: list<array<array-key, mixed>>,
     *     notifications: list<array<array-key, mixed>>,
     *     structures: list<array<array-key, mixed>>,
     *     enumerations: list<array<array-key, mixed>>,
     *     typeAliases: list<array<array-key, mixed>>
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            // @phpstan-ignore-next-line
            metaData: MetaData::fromArray($data['metaData']),
            // @phpstan-ignore-next-line
            requests: \array_map(Request::fromArray(...), $data['requests'] ?? []),
            // @phpstan-ignore-next-line
            notifications: \array_map(Notification::fromArray(...), $data['notifications'] ?? []),
            // @phpstan-ignore-next-line
            structures: \array_map(Structure::fromArray(...), $data['structures'] ?? []),
            // @phpstan-ignore-next-line
            enumerations: \array_map(Enumeration::fromArray(...), $data['enumerations'] ?? []),
            // @phpstan-ignore-next-line
            typeAliases: \array_map(TypeAlias::fromArray(...), $data['typeAliases'] ?? []),
        );
    }
}
