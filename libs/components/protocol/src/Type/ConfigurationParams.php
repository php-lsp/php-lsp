<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a configuration request.
 */
final class ConfigurationParams
{
    public function __construct(
        /**
         * @var list<ConfigurationItem>
         */
        public readonly array $items = [],
    ) {}
}
