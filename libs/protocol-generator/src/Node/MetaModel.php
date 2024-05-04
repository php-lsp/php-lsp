<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * The actual meta model.
 */
final class MetaModel extends Node
{
    /**
     * @param MetaData $metaData Additional meta data.
     * @param list<Request> $requests The requests.
     * @param list<Notification> $notifications The notifications.
     * @param list<Structure> $structures The structures.
     * @param list<Enumeration> $enumerations The enumerations.
     * @param list<TypeAlias> $typeAliases The type aliases.
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
