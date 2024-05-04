<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a configuration request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ConfigurationParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<ConfigurationItem> $items
     */
    final public function __construct(
        public readonly array $items,
    ) {}
}
