<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\MetaModel;

/**
 * @template-extends Hydrator<MetaModel, array<array-key, mixed>>
 */
final class MetaModelHydrator extends Hydrator
{
    private readonly MetaDataHydrator $metaDataHydrator;
    private readonly RequestHydrator $requestHydrator;
    private readonly NotificationHydrator $notificationHydrator;
    private readonly EnumerationHydrator $enumerationHydrator;
    private readonly StructureHydrator $structureHydrator;
    private readonly TypeAliasHydrator $typeAliasHydrator;

    public function __construct()
    {
        $types = new TypeHydrator();

        $this->metaDataHydrator = new MetaDataHydrator();
        $this->requestHydrator = new RequestHydrator($types);
        $this->notificationHydrator = new NotificationHydrator($types);
        $this->enumerationHydrator = new EnumerationHydrator();
        $this->structureHydrator = new StructureHydrator($types);
        $this->typeAliasHydrator = new TypeAliasHydrator($types);
    }

    public function hydrate(array $data): MetaModel
    {
        return new MetaModel(
            // @phpstan-ignore-next-line
            metaData: $this->metaDataHydrator->hydrate($data['metaData']),
            // @phpstan-ignore-next-line
            requests: $this->requestHydrator->hydrateAll($data['requests'] ?? []),
            // @phpstan-ignore-next-line
            notifications: $this->notificationHydrator->hydrateAll($data['notifications'] ?? []),
            // @phpstan-ignore-next-line
            structures: $this->structureHydrator->hydrateAll($data['structures'] ?? []),
            // @phpstan-ignore-next-line
            enumerations: $this->enumerationHydrator->hydrateAll($data['enumerations'] ?? []),
            // @phpstan-ignore-next-line
            typeAliases: $this->typeAliasHydrator->hydrateAll($data['typeAliases'] ?? []),
        );
    }
}
