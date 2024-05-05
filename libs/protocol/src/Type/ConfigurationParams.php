<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a configuration request.
 *
 * @generated
 */
final class ConfigurationParams
{
    /**
     * @param list<ConfigurationItem> $items
     */
    final public function __construct(
        public readonly array $items,
    ) {}
}
