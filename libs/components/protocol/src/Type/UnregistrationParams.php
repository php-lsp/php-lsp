<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

final class UnregistrationParams
{
    public function __construct(
        /**
         * @var list<Unregistration>
         */
        public readonly array $unregisterations = [],
    ) {}
}
