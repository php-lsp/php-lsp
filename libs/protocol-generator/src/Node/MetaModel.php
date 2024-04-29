<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

/**
 * The actual meta model.
 */
final class MetaModel
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
        public readonly MetaData $metaData,
        public readonly array $requests,
        public readonly array $notifications,
        public readonly array $structures,
        public readonly array $enumerations,
        public readonly array $typeAliases,
    ) {}
}
