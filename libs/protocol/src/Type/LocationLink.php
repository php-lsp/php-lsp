<?php

namespace Lsp\Protocol\Type;

/**
 * Represents the connection of two locations. Provides additional metadata over normal {@link Location locations},
 * including an origin range.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class LocationLink
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $targetUri
     */
    final public function __construct(
        public readonly Range $originSelectionRange,
        public readonly string $targetUri,
        public readonly Range $targetRange,
        public readonly Range $targetSelectionRange,
    ) {}
}
